<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserFriendRequestRepository;
use App\Repositories\UserRepository;
use App\Validators\AuthValidators;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userRepository;
    private $hasFriendrequestRepository;
    private $validators;

    public function __construct(
        UserRepository $userRepository,
        UserFriendRequestRepository $hasFriendrequestRepository,
        AuthValidators $validators)
    {
        $this->userRepository = $userRepository;
        $this->hasFriendrequestRepository = $hasFriendrequestRepository;
        $this->validators = $validators;
    }

    public function getUser($id)
    {
        $user = $this->userRepository->getUserById($id);
        if($user) return response()->json($user, 200);
        else return response()->json('NOT_FOUND', 404);
    }

    public function  inviteFriend(Request $request)
    {
       $validate = $this->validators->hasFriendValidators($request);
       if($validate){
            $verifyIfExistInvite = $this->hasFriendrequestRepository->verifyIfHasRequestFriend($request);
            if(!$verifyIfExistInvite){
                $userHasfriend = $this->hasFriendrequestRepository->inviteFriend($request);
                return response()->json($userHasfriend,200);
            }else{
                return response()->json('UNAUTHORIZED',401);
            }
       }
       return response()->json($validate, 422);
    }

    public function  aproveFriend(Request $request)
    {

        $validate = $this->validators->hasFriendValidators($request);

        if($validate){
            $userHasFriend = $this->hasFriendrequestRepository->getStatusPeedingByUserAndFriendId($request);
            if($userHasFriend ){
                $userHasFriend = $this->hasFriendrequestRepository->aproveFriend($userHasFriend);
                return response()->json($userHasFriend,200);
            }else{
                return response()->json('UNAUTHORIZED',401);
            }
        }
        return response()->json($validate, 422);

    }

    public function  refuseFriend(Request $request)
    {

        $validate = $this->validators->hasFriendValidators($request);

        if($validate){
            $userHasFriend = $this->hasFriendrequestRepository->getStatusPeedingToRefuseByUserAndFriendId($request);
            if($userHasFriend){
                $userHasFriend = $this->hasFriendrequestRepository->refuseFriend($userHasFriend);
                return response()->json($userHasFriend,200);
            }else{
                return response()->json('UNAUTHORIZED',401);
            }
        }
        return response()->json($validate, 422);
    }

    public function  blockFriend(Request $request)
    {

        $validate = $this->validators->hasFriendValidators($request);

        if($validate ){
            $userHasFriend = $this->hasFriendrequestRepository->getByUserAndFriendId($request);
            if($userHasFriend ){
                $userHasFriend = $this->hasFriendrequestRepository->blocked($userHasFriend);
                return response()->json($userHasFriend,200);
            }else{
                return response()->json('UNAUTHORIZED',401);
            }
        }
        return response()->json($validate, 422);
    }

    public function  deleteFriend(Request $request)
    {
        $validate = $this->validators->hasFriendValidators($request);

        if($validate ){
            $userHasFriend = $this->hasFriendrequestRepository->getByUserAndFriendId($request);
            if($userHasFriend ){
                $userHasFriend = $this->hasFriendrequestRepository->delete($userHasFriend);
                return response()->json($userHasFriend,200);
            }else{
                return response()->json('UNAUTHORIZED',401);
            }
        }
        return response()->json($validate, 422);
    }

}
