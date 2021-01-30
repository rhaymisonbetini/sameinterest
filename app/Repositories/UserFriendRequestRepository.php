<?php

namespace App\Repositories;

use App\UserFriendRequest;

class UserFriendRequestRepository
{
    private $pedding = 'PENDING';
    private $aproved = 'APROVED';
    private $refused = 'REFUSED';
    private $blocked = 'BLOCKED';


    public function verifyIfHasRequestFriend($request)
    {
        $userHasFriend = UserFriendRequest::where(function($query) use ($request){
            $query->where('id_user', $request->id_user)
                  ->where('id_friend', $request->id_friend);

        })->orWhere(function($query) use ($request){
            $query->where('id_user', $request->id_friend)
                  ->where('id_friend', $request->id_user);
        })->first();

        return $userHasFriend;
    }

    public function getStatusPeedingByUserAndFriendId($request)
    {
        return UserFriendRequest::where('id_user', $request->id_user)
            ->where('id_friend', $request->id_friend)
            ->where('status', $this->pedding)
            ->first();
    }

    public function getStatusPeedingToRefuseByUserAndFriendId($request)
    {
        return UserFriendRequest::where('id_user', $request->id_user)
            ->where('id_friend', $request->id_friend)
            ->where('status', $this->pedding)
            ->first();

    }

    public function getByUserAndFriendId($request)
    {
        return UserFriendRequest::where('id_user', $request->id_user)
            ->where('id_friend', $request->id_friend)
            ->first();
    }

    public function inviteFriend($request)
    {
        $userHasFriend = new UserFriendRequest;
        $userHasFriend->id_user = $request->id_user;
        $userHasFriend->id_friend = $request->id_friend;
        $userHasFriend->status = $this->pedding;
        $userHasFriend->save();
        return $userHasFriend;
    }


    public function aproveFriend($userHasFriend)
    {
        $userHasFriend->status = $this->aproved;
        $userHasFriend->update();
        return $userHasFriend;
    }

    public function refuseFriend($userHasFriend)
    {
        $userHasFriend->status = $this->refused;
        $userHasFriend->update();
        return $userHasFriend;
    }

    public function blocked($userHasFriend)
    {
        $userHasFriend->status = $this->blocked;
        $userHasFriend->update();
        return $userHasFriend;
    }

    public function delete($userHasFriend)
    {
        $userHasFriend->delete();
        return $userHasFriend;
    }
}