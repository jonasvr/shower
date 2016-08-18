<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','device_code','koten_id','name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function scopeFindDevices($query,$koten_id)
    {
        return $query->where('koten_id',$koten_id);
    }

    public function scopeDevicesRes($query,$koten_id,$now)
    {
        $end = $now->copy->subMinutes(10);
        return $query->where('devices.koten_id',$koten_id)
            ->join('reservaties as res','res.device_id','=','devices.id')
            ->where('res.start','>',$now)
            ->where('res.start','<',$end);
    }

    public function scopeFindDevicesByCode($query,$code)
    {
        return $query->where('device_code',$code);
    }

    public function scopeDevicesById($query,$id)
    {
        return $query->where('id',$id);
    }
}
