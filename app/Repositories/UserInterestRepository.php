<?php

namespace App\Repositories;

use App\UserHasInterest;

class UserInterestRepository
{

    public function getUserInterestById($id)
    {
        $userInterest = UserHasInterest::where('id_user', $id)->get();
        if($userInterest){
            $userInterest->load('interest');
        }
        return $userInterest;
    }
}