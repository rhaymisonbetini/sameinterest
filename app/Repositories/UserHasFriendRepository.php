<?php

namespace App\Repositories;

use App\UserHasFriend;

class UserHasFriendRepository
{

    private $pedding = 'PENDING';
    private $aproved = 'APROVED';
    private $refused = 'REFUSED';

    public function inviteFriend($request)
    {
        $userHasfriend = new UserHasFriend;
        $userHasfriend->id_user = $request->id_user;
        $userHasfriend->id_friend = $request->id_friend;
        $userHasfriend->status = $this->pedding;
        $userHasfriend->save();
        return $userHasfriend;
    }

    public function getStatusPeedingByUserAndFriendId($request)
    {
        return UserHasFriend::where('id_user', $request->id_user)
            ->where('id_friend', $request->id_friend)
            ->where('status', $this->pedding)
            ->first();
    }

    public function aproveFriend($userHasFriend)
    {
        $userHasFriend->status = $this->aproved;
        $userHasFriend->update();
        return;
    }

    public function refuseFriend($userHasFriend)
    {
        $userHasFriend->status = $this->refused;
        $userHasFriend->update();
        return;
    }

}