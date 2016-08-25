<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AddDeviceRequest;
use App\Http\Requests\EditDeviceRequest;
use App\Http\Requests\AddKotRequest;

use App\User;
use App\Koten;
use App\Device;
use App\Reservatie;
use App\KotRequest;
use Auth;
use Redirect;
use Carbon\Carbon;

use App\Jobs\NotifyAccept;
use App\Jobs\NotifyRequest;

class KotController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Koten
     */
    protected $koten;

    /**
     * @var Device
     */
    protected $device;

    /**
     * @var Reservatie
     */
    protected $res;
    /**
     * @var KotRequest
     */
    protected $kr;

    /**
     * KotController constructor.
     * @param User $user
     * @param Koten $koten
     * @param Device $devices
     * @param Reservatie $res
     * @param KotRequest $kr
     */
    public function __construct(
        User $user,
        Koten $koten,
        Device $devices,
        Reservatie $res,
        KotRequest $kr
    )
    {
        $this->user = $user;
        $this->koten = $koten;
        $this->device = $devices;
        $this->res = $res;
        $this->kr = $kr;
    }

    /**
     * @return $this
     */
    public function admin()
    {
        $kot = $this->koten->FindKot(Auth::user()->koten_id)
        ->first();
        $devices=[];
        if(Auth::user()->koten_id){
            $devices = $this->device->FindDevices($kot->id)
                ->get();
        }
        $devices = $this->checkReserve($devices);
        $res = $this->res->GetState()
            ->get();
        $kr = [];
        if(Auth::user()->admin){
            $kr = $this->kr->UserRequests($kot->id)
                ->get();
        }
        $data = [
            'kot' => $kot,
            'devices' => $devices,
            'res' => $res,
            'kr' => $kr,
        ];
        return view('admin.admin')->with($data);
    }
    /**
     * @param AddKotRequest $request
     * @return mixed
     */
    public function addKot(AddKotRequest $request)
    {

        $kot = $this->koten->KotByCode($request->code)
            ->first();
        $input = [
            'user_id' => Auth::id(),
            'koten_id' => $kot->id,
        ];
        $kr = $this->kr->create($input);
        $user = Auth::user();
        $user->steps = 1;
        $user->save();
        $admin = $this->user->admin($kr->koten_id)->first();

        $this->dispatch(new NotifyRequest($kr->id,$user,$admin));

        return redirect()->route('getProfile');
    }

    /**
     * @param AddDeviceRequest $request
     * @return mixed
     */
    public function addDevice(AddDeviceRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $kot = $this->koten->FindKot(Auth::user()->koten_id)->first();
        $data['koten_id'] = $kot->id;
        $this->device->where('device_code',$request->device_code)->update($data);
        session(['success' => "Your device was added."]);

        return back();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function accept($id)
    {
        $request = $this->kr->where('id',$id)->first();
        $kot = $this->koten->where('id',$request->koten_id)->first();
        if($this->permission($kot)){
            $user = $this->user->where('id',$request->user_id)->first();
            $user->update(['koten_id' => $kot->id]);
            $this->dispatch(new NotifyAccept($user, $kot->code,true));
            $request->delete();
            session(['success' => "The user has been added to your kot."]);
        }else{
            session(['error' =>"You can't accept this user."]);
        }
        return back();

    }

    /**
     * @param $id
     * @return mixed
     */
    public function decline($id)
    {
        $request = $this->kr->where('id',$id)->first();
        $kot = $this->koten->where('id',$request->koten_id)->first();
        if($this->permission($kot)) {
            $user = $this->user->find($request->user_id)->first();
            $user->steps = 0;
            $user->save();
            $this->dispatch(new NotifyAccept($user, $kot->code, false));
            $request->delete();
            session(['success' => "The user request has been denied."]);
        }else {
            session(['success' => "You don't have permission to decline this user."]);
        }

        return back();
    }

    public function broken($id)
    {
        $device = $this->device->where('id',$id)->first();
        if($device->state == 2)
        {
            $device->state = 1;
            session(['success' =>"The devices state has been set to free."]);
        }else{
            $device->state = 2;
            session(['success' => "The devices state has been set to broken."]);
        }
        $device->save();

        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteHabitant($id)
    {
        $user = $this->user->where('id',$id)
            ->where('koten_id',Auth::user()->koten_id)
            ->first();
        if(count($user))
        {
            $user->koten_id = 0;
            $user->save();
            session(['success' => "The user has been deleted."]);
        }else{
            session(['success' => "Something went wrong."]);
        }


        return back();
    }

    public function getedit($id)
    {
        $device = $this->device->where('id',$id)->first();
        return view('admin.functions.edit')->with(['device'=>$device]);
    }

    /**
     * @param EditDeviceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editDevice(EditDeviceRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $this->device->where('device_code',$request->device_code)->update($data);
        session(['success' => "The name of your device has changed."]);

        return redirect()->route('admin');
    }

    /////HELPER////////////

    /**
     * @param $kot
     * @return bool
     */
    public function permission($kot)
    {
        if(Auth::user()->koten_id == $kot->id && Auth::user()->admin) {
            return true;
        }else{
            return false;
        }
    }


    /**
     * @param $devices
     * @return mixed
     */
    public function checkReserve($devices)
    {
        $now = Carbon::now();
        $end = $now->copy()->subMinutes(10);
        foreach ($devices as $key => $item)
        {
            $item['res'] = 1;
            $res = $this->res->where('device_id',$item->id)->get();
            foreach ($res as $key => $item2)
            {
                if($item2->start < $now && $item2->start > $end)
                {
                    $item['res'] = 0;
                }
            }
        }

        return $devices;
    }
}
