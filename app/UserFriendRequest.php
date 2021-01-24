<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFriendRequest extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\User','id_user','id');
    }

    public function friend()
    {
        return $this->belongsTo('App\User','id_friend','id');
    }
}
