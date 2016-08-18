<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Koten;
use App\Device;
use App\KotRequest;
use App\Reservatie;
use Auth;
use Illuminate\Support\Facades\URL;
use Redirect;
use App\Http\Requests\InfoRequest;

class ProfileController extends Controller
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
     * @var Reservatie
     */
    protected $res;
    /**
     * ProfileController constructor.
     * @param User $user
     * @param Koten $koten
     * @param Device $devices
     * @param KotRequest $kr
     * @param Reservatie $res
     */
    public function __construct(
        User $user,
        Koten $koten,
        Device $devices,
        KotRequest $kr,
        Reservatie $res
    )
    {
        $this->user = $user;
        $this->koten = $koten;
        $this->device = $devices;
        $this->kr = $kr;
        $this->res = $res;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('profile.info');
    }

    /**
     * @param InfoRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addInfo(InfoRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $this->koten->where('id',Auth::user()->koten_id)
            ->update($data);

        return redirect()->route('getProfile');
    }

    /**
     * @return $this
     */
    public function getProfile()
    {
        $kot = $this->koten->FindKot(Auth::user()->koten_id)
            ->first();
        $kr = $this->kr->UserRequests($kot->id)
            ->get();
        $habitants = $this->user->where('koten_id',Auth::user()->koten_id)
            ->get();
        $devices = $this->device->FindDevices($kot->id)
            ->get();
        $devices = $this->checkReserve($devices);
        $res = $this->res->where('reservaties.user_id',Auth::id())
            ->join('devices','devices.id','=','reservaties.device_id')
            ->orderBy('reservaties.start')
            ->where('reservaties.start','>',Carbon::now())
            ->select('reservaties.id', 'reservaties.start', 'devices.name')
            ->get();
        $data = [
            'kot' => $kot,
            'devices' => $devices,
            'kr' => $kr,
            'habitants' => $habitants,
            'res' => $res,
        ];
        return view('profile.profile')->with($data);
    }


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
