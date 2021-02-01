<?php

namespace App\Http\Controllers\UserInterest;

use App\Http\Controllers\Controller;
use App\Repositories\UserInterestRepository;
use Illuminate\Http\Request;

class UnserInterestController extends Controller
{
    private $userInterestRepository;

    public function __construct(UserInterestRepository $userInterestRepository)
    {
        $this->userInterestRepository = $userInterestRepository;
    }

    public function getUserInterestById()
    {
        // $userId = auth('api')->user()->id;
        $userId = 2;
        $userInterest = $this->userInterestRepository->getUserInterestById($userId);
        if($userInterest) return response()->json($userInterest,200);
        else return response()->json('NOT_FOUND', 404);
    }

}
