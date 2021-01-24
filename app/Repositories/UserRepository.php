<?php

namespace App\Repositories;

use App\User;

class UserRepository
{

    public function getUserById($id)
    {
        $user = User::find($id);
        if($user) $user->load(
            'hasInterest',
            'hasInterest.interest',
            'hasFriend',
            'hasFriend.friend',
            'friendRequest',
            'friendRequest.friend'
        );
        return $user;
    }

}