<?php

namespace App\Http\Controllers\Interest;

use App\Repositories\InterestRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    
    private $interestRepository;

    public function __construct(InterestRepository $interestRepository)
    {
        $this->interestRepository = $interestRepository;
    }


    public function getInterest()
    {
        $interest = $this->interestRepository->getInterest();
        return response()->json($interest,200);
    }

    
}
