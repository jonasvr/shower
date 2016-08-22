<?php

namespace App\Http\Controllers;

use App\Events\ShowerStateEvent;
use App\Reservatie;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Device;
use Carbon\Carbon;
use Auth;

class ApiController extends Controller
{
    /**
     * @var Device
     */
    protected $device;

    /**
     * @var Reservatie
     */
    protected $res;
    /**
     * ApiController constructor.
     * @param Device $device
     * @param Reservatie $res
     */
    public function __construct(Device $device, Reservatie $res)
    {
        $this->device = $device;
        $this->res = $res;
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
                    $device->spend_time += $dif;
                }
                $device->state = $state;
                $device->save();
                event(new ShowerStateEvent($device->koten_id));

                return 'succes';
            }

        return 'error';
    }

    /**
     * @param $koten_id
     * @return array
     */
    public function changeState($koten_id)
    {
        $devices = [];
        if(Auth::user()->koten_id == $koten_id){
            $devices = $this->device->FindDevices($koten_id)
                ->get();
        }

        $devices = $this->checkReserve($devices);
        return $devices;
    }

    /**
     * @param $device_id
     * @return array
     */
    public function changecalState($device_id)
    {
        $devices = [];
        if(Auth::user()->koten_id == $device_id){
            $device = $this->device->where('id',$device_id)
                ->first();
        }


        $now = Carbon::now();
        $end = $now->copy()->subMinutes(10);
            $device['res'] = 1;
            $res = $this->res->where('device_id',$device->id)->get();
            foreach ($res as $key => $item2)
            {
                if($item2->start < $now && $item2->start > $end)
                {
                    $device['res'] = 0;
                }
            }

       return $device;
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
