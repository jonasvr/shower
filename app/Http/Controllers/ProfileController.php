<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Koten;
use App\Device;
use App\KotRequest;
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
        $devices = $this->device->FindDevices($kot->id)
            ->get();
        $data = [
            'kot' => $kot,
            'devices' => $devices,
            'kr' => $kr
        ];
        return view('profile.profile')->with($data);
    }

}
