<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Device;
use Carbon\Carbon;

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
     * @param $device_code
     * @param $state
     * @return string
     */
    public function ShowerGet($device_code, $state)
    {

        $device = $this->device->FindDevicesByCode($device_code)->first();
            if($device->state != 2)
            {
                if ($device->state == 0)
                {
                    $now = Carbon::now();
                    $dif = $now->diffInMinutes($device->updated_at);
                    echo $now;
                    echo "<br>";
                    echo $device->updated_at;
                    echo $dif;
                    $device->spend_time += $dif;
                }
                $device->state = $state;
                $device->save();
                return 'succes';
            }

        return 'error';
    }
}
