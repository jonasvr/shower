<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
