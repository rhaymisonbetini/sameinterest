<?php

namespace Tests\Unit;

use App\Repositories\UserInterestRepository;
use App\UserHasInterest;
use Tests\TestCase;

class UserInterestRepositoryTest extends TestCase
{
    
     /** @test */
    public function getUserInterestByIdTest()
    {
        $userTest = 1; // usuário root de teste criado pela seed padrao;
        $userInterest = UserHasInterest::where('id_user', $userTest)->get();
        if($userInterest){
            $userInterest->load('interest');
        }

        $userInterestRepository = new UserInterestRepository;
        $userInterestTeste = $userInterestRepository->getUserInterestById($userTest);

        $this->assertEquals($userInterest, $userInterestTeste);

    }

}
