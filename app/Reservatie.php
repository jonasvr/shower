<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class Reservatie extends Model
{
    /**
     * @var string
     */
    protected $table = 'reservaties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','device_id','user_id','start',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function scopeGetUses($query)
    {
        return $query->join('devices as dev','dev.id','=','reservaties.device_id')
            ->join('users','users.id','=','reservaties.user_id');
    }

    public function scopeCountGirl($query)
    {
        return $query->where('users.sex',1)->count();
    }

    public function scopeCountBoy($query)
    {
        return $query->where('users.sex',0)->count();
    }

    public function scopeGetKot($query,$koten_id)
    {
        return $query->where('users.koten_id',$koten_id);
    }

    public function scopeGetState($query)
    {
        $query->where('reservaties.user_id',Auth::id())
            ->join('devices','devices.id','=','reservaties.device_id')
            ->orderBy('reservaties.start')
            ->where('reservaties.start','>',Carbon::now())
            ->select('reservaties.id', 'reservaties.start', 'devices.name');
    }
}
