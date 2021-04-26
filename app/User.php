<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function referred_through()
    {
        return $this->belongsTo('App\User','referred_by','id');
    }

    public function referred_to()
    {
        return $this->hasMany('App\User','referred_by','id');
    }

    public function user_points()
    {
        return $this->hasMany('App\Model\UserPoints','userId','id');
    }

    public function membership()
    {
        return $this->belongsTo('App\Model\Membership','membershipId','id');
    }
}
