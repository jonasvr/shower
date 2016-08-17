<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koten extends Model
{
    /**
     * @var string
     */
    protected $table = 'kotens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','code','street','city','nr','postalcode'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeFindKot($query,$id)
    {
        return $query->where('id','=',$id);
    }

    public function scopeKotByCode($query,$code)
    {
        return $query->where('code','=',$code);
    }


}
