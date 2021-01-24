<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasInterest extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\User','id_user','id');
    }

    public function interest()
    {
        return $this->belongsTo('App\Interest','id_interest','id');
    }

}
