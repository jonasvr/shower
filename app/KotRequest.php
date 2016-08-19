<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KotRequest extends Model
{
    /**
     * @var string
     */
    protected $table = 'kot_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','user_id','koten_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function scopeUserRequests($query,$koten_id)
    {
        $query->where('kot_requests.koten_id',$koten_id)
            ->join('users','kot_requests.user_id','=','users.id')
            ->select('kot_requests.id as id','users.name','users.image_url');
    }
}
