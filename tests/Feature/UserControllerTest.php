<?php

namespace Tests\Feature;

use App\UserFriendRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    
    use DatabaseTransactions;

    /** @test */
    public function getUserByIdSuccessTest()
    {
        $this->get('api/user/2')->assertStatus(200);
    }
       
    /** @test */
    public function getUserByIdNotFoundTest()
    {
        $this->get('api/user/hereunespectedId')->assertStatus(404);
    }

    /** @test */
    public function inviteFriendTest()
    {

        $user1 = 1;
        $user2 = 2;
        $verify = false;
        do{
            $verify = UserFriendRequest::where('id_user',$user1)->where('id_friend', $user2 )->first();
            if($verify){
                $user1 ++;
                $user2 ++;
            }
        } while ($verify);

        $request = ['id_user'   => $user1, 'id_friend'  => $user2];
        $this->post('api/invite', $request)->assertStatus(200);
    }

    /** @test */
    public function aproveFriend()
    {
        $user1 = 1;
        $user2 = 2;
        $request = ['id_user' =>  $user1, 'id_friend'  =>  $user2 ];
        $this->post('api/aprove',$request)->assertStatus(200);
    }

    /** @test */
    public function refuseFriendTest()
    {
        $user1 = 1;
        $user2 = 2;
        $request = ['id_user' =>  $user1, 'id_friend'  =>  $user2 ];
        $this->post('api/refuse',$request)->assertStatus(200);
    }

    /** @test */
    public function blockFriendTest()
    {
        $user1 = 1;
        $user2 = 2;
        $request = ['id_user' =>  $user1, 'id_friend'  =>  $user2 ];
        $this->post('api/block',$request)->assertStatus(200);

    }

    /** @test */
    public function deleteFriendTest()
    { 
        $user1 = 1;
        $user2 = 2;
        $request = ['id_user' =>  $user1, 'id_friend'  =>  $user2 ];
        $this->post('api/delete',$request)->assertStatus(200);
    }

}
