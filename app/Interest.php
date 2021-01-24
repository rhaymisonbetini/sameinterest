<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;

    public function hasInterest()
    {
        return $this->hasMany('App\UserHasInterest','id_interest','id');
    }

}
