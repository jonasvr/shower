<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','koten_id','admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function koten()
    {
        return $this->hasOne('App\Koten','id','koten_id');
    }

    public function scopeAdmin($query,$koten_id)
    {
        return $query->where('koten_id', $koten_id)
            ->where('admin',1);
    }
}
