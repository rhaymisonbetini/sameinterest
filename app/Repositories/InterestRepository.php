<?php


namespace App\Repositories;

use App\Interest;

class InterestRepository
{

    public function getInterest()
    {
        return Interest::orderBy('interest','asc')->get();
    }
    
}