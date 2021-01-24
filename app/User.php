<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject

{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasInterest()
    {
        return $this->hasMany('App\UserHasInterest','id_user','id');
    }

    public function hasFriend()
    {
        return $this->hasMany('App\UserHasFriend','id_user','id');
    }

    public function imFriend()
    {
        return $this->hasMany('App\UserHasFriend','id_friend','id');
    }

    public function friendRequest()
    {
        return $this->hasMany('App\UserFriendRequest','id_user','id');
    }

    public function myRequest()
    {
        return $this->hasMany('App\UserFriendRequest','id_friend','id');
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }   
}
