<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AddDeviceRequest;
use App\Http\Requests\AddKotRequest;

use App\User;
use App\Koten;
use App\Device;
use App\KotRequest;
use Auth;
use Redirect;

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
     * @var KotRequest
     */
    protected $kr;

    /**
     * ProfileController constructor.
     * @param User $user
     * @param Koten $koten
     * @param Device $devices
     * @param KotRequest $kr
     */
    public function __construct(
        User $user,
        Koten $koten,
        Device $devices,
        KotRequest $kr
    )
    {
        $this->user = $user;
        $this->koten = $koten;
        $this->device = $devices;
        $this->kr = $kr;
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
        $device = $this->device->where('device_code',$data['device_code'])->first();
        if(count($device)){
            $kot = $this->koten->FindKot(Auth::user()->koten_id)->first();
            $data['koten_id'] =     $kot->id;
            $device->update($data);
        }else{
            $error = ['device_code'=>"The device ID you have given isn't correct"];
        }

        return redirect()->route('getProfile');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function accept($id)
    {
        $request = $this->kr->find($id)->first();
        $kot = $this->koten->find($request->koten_id)->first();
        $user = $this->user->where('id',$request->user_id)->first();
        $user->update(['koten_id' => $kot->id]);
        $this->dispatch(new NotifyAccept($user, $kot->code,true));
        $request->delete();

        return redirect()->route('getProfile');

    }

    /**
     * @param $id
     * @return mixed
     */
    public function decline($id)
    {
        $request = $this->kr->find($id)->first();
        $kot = $this->koten->find($request->koten_id)->first();
        $user = $this->user->find($request->user_id)->first();
        $this->dispatch(new NotifyAccept($user, $kot->code,false));
        $request->delete();

        return redirect()->route('getProfile');
    }


    public function deleteHabitant($id)
    {
        $this->user->where('id',$id)->koten_id = 0;
        $this->user->save();

        return back();
    }
}
