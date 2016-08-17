<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Device;

class ApiController extends Controller
{
    /**
     * @var Device
     */
    protected $device;

    /**
     * ApiController constructor.
     * @param Device $device
     */
    public function __construct(Device $device)
    {
        $this->device = $device;
    }

    /**
     * @param $device_id
     * @param $state
     * @return string
     */
    public function ShowerGet($device_code, $state)
    {
        $this->device->FindDevicesByCode($device_code)
            ->update($state);
//        event(new ShowerUpdate($this->showers));
        return 'succes';
    }
}
