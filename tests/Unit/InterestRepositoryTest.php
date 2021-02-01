<?php

namespace Tests\Unit;

use App\Interest;
use App\Repositories\InterestRepository;
use Tests\TestCase;

class InterestRepositoryTest extends TestCase
{
    /** @test */
    public function getInterestsTest()
    {
        $allInterest = Interest::orderBy('interest','asc')->get();

        $interestRepository = new InterestRepository;
        $interetAllTest = $interestRepository->getInterest();
        $this->assertEquals($allInterest, $interetAllTest,'GET_ALL_INTEREST_TEST_SUCCESS');

    }

}