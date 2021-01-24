<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserHasFriendRepository;
use App\Repositories\UserRepository;
use App\Validators\AuthValidators;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userRepository;
    private $hasFriendRepository;
    private $validators;

    public function __construct(
        UserRepository $userRepository,
        UserHasFriendRepository $hasFriendRepository,
        AuthValidators $validators)
    {
        $this->userRepository = $userRepository;
        $this->hasFriendRepository = $hasFriendRepository;
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
            $userHasfriend = $this->hasFriendRepository->inviteFriend($request);
            return response()->json($userHasfriend,200);
       }
       return response()->json($validate, 422);
    }

    public function  aproveFriend(Request $request)
    {
        $userHasFriend = $this->hasFriendRepository->getStatusPeedingByUserAndFriendId($request);
        if($userHasFriend){
        }
    }

    public function  refuseFriend(Request $request)
    {

    }

}
