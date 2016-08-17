<?php

namespace App;

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

    public function scopeFindDevicesByCode($query,$code)
    {
        return $query->where('code',$code);
    }
}
