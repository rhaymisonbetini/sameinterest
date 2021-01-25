<?php

namespace Tests\Unit;

use App\Repositories\UserRepository;
use App\User;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
   

    /** @test */
    public function getUserByIdTest()
    {

        $id = 2;
        $testUser = User::find($id);
        if($testUser) $testUser->load(
            'hasInterest',
            'hasInterest.interest',
            'hasFriend',
            'hasFriend.friend',
            'friendRequest',
            'friendRequest.friend'
        );

        $userRepository = new UserRepository;
        $findUser = $userRepository->getUserById($id);

        if($findUser)  $findUser->load(
            'hasInterest',
            'hasInterest.interest',
            'hasFriend',
            'hasFriend.friend',
            'friendRequest',
            'friendRequest.friend'
        );

        $this->assertEquals($testUser, $findUser,'GET_USER_BY_ID');

    }
}
