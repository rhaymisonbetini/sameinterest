<?php

namespace Tests\Unit;

use App\Repositories\UserFriendRequestRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\UserFriendRequest;
use Tests\TestCase;
use Illuminate\Http\Request;

class UserFriendRequestRepositoryTest extends TestCase
{

    use DatabaseTransactions;

    private $pedding = 'PENDING';
    private $aproved = 'APROVED';
    private $refused = 'REFUSED';
    private $blocked = 'BLOCKED';


    /** @test */
    public function verifyIfHasRequestFriendTest()
    {

        $request = new Request([
            'id_user'   => 1,
            'id_friend'  => 2,
        ]);

        $userHasFriend = UserFriendRequest::where(function($query) use ($request){
            $query->where('id_user', $request->id_user)
                  ->where('id_friend', $request->id_friend);

        })->orWhere(function($query) use ($request){
            $query->where('id_user', $request->id_friend)
                  ->where('id_friend', $request->id_user);
        })->first();

        $userFriendRequestRepository = new UserFriendRequestRepository;
        $repositoryResponse = $userFriendRequestRepository->verifyIfHasRequestFriend($request);
       
        $this->assertEquals($userHasFriend, $repositoryResponse,'VERIFY_IF_HAS_REQUEST_FRIEND');

    }


    /** @test */
    public function getStatusPeedingByUserAndFriendIdTest()
    {
        $request = new Request([
            'id_user'   => 1,
            'id_friend'  => 2,
        ]);

        $userHasFriend = UserFriendRequest::where('id_user', $request->id_user)
            ->where('id_friend', $request->id_friend)
            ->where('status', $this->pedding)
            ->first();

        $userFriendRequestRepository = new UserFriendRequestRepository;
        $repositoryResponse = $userFriendRequestRepository->getStatusPeedingByUserAndFriendId($request);
       
        $this->assertEquals($userHasFriend, $repositoryResponse,'VERIFY_STATUS_PEDING_REQUEST');        
        
    }

      /** @test */
    public function getStatusPeedingToRefuseByUserAndFriendIdTest()
    {
        $request = new Request([
            'id_user'   => 1,
            'id_friend'  => 2,
        ]);

        $userHasFriend = UserFriendRequest::where('id_user', $request->id_user)
            ->where('id_friend',  $request->id_friend )
            ->where('status', $this->pedding)
            ->first();

        $userFriendRequestRepository = new UserFriendRequestRepository;
        $repositoryResponse = $userFriendRequestRepository->getStatusPeedingToRefuseByUserAndFriendId($request);
       
        $this->assertEquals($userHasFriend, $repositoryResponse,'VERIFY_STATUS_PEDING_TO_REFUSE_REQUEST');        
        
    }

    /** @test */
    public function getByUserAndFriendId()
    {
        $request = new Request([
            'id_user'   => 1,
            'id_friend'  => 2,
        ]);

        $userHasFriend = UserFriendRequest::where('id_user', $request->id_user)
            ->where('id_friend', $request->id_friend)
            ->first();

        $userFriendRequestRepository = new UserFriendRequestRepository;
        $repositoryResponse = $userFriendRequestRepository->getByUserAndFriendId($request);
       
        $this->assertEquals($userHasFriend, $repositoryResponse,'VERIFY_GET_USER_AND_ID_FRIEND');
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

        $request = new Request([
            'id_user'   => $user1,
            'id_friend'  => $user2,
        ]);
        
        $userFriendRequestRepository = new UserFriendRequestRepository;
        $repositoryResponse = $userFriendRequestRepository->inviteFriend($request);
        if($repositoryResponse){
            $this->assertTrue(true,'VERIFY_INVITE_FRIEND');
        }

    }

      /** @test */
      public function aproveFriendTest()
      {
          $request = new Request([
              'id_user'   => 1,
              'id_friend'  => 2,
          ]);
  
          $userHasFriend = new UserFriendRequestRepository;
          $model = $userHasFriend->getByUserAndFriendId($request);
          
          $repositoryResponse = $userHasFriend->aproveFriend($model);
          
          if($repositoryResponse){
              $this->assertTrue(true,'VERIFY_APROVE_FRIEND');
          }
  
      }


    /** @test */
    public function refuseFriendTest()
    {
        $request = new Request([
            'id_user'   => 1,
            'id_friend'  => 2,
        ]);

        $userHasFriend = new UserFriendRequestRepository;
        $model = $userHasFriend->getByUserAndFriendId($request);
        
        $repositoryResponse = $userHasFriend->refuseFriend($model);
        
        if($repositoryResponse){
            $this->assertTrue(true,'VERIFY_REFUSE_FRIEND');
        }

    }


    /** @test */
    public function bloquedFriendTest()
    {
        $request = new Request([
            'id_user'   => 1,
            'id_friend'  => 2,
        ]);

        $userHasFriend = new UserFriendRequestRepository;
        $model = $userHasFriend->getByUserAndFriendId($request);
        
        $repositoryResponse = $userHasFriend->aproveFriend($model);
        
        if($repositoryResponse){
            $this->assertTrue(true,'VERIFY_BLOQUED_FRIEND');
        }

    }


    /** @test */
    public function deleteFriendTest()
    {
        $request = new Request([
            'id_user'   => 1,
            'id_friend'  => 2,
        ]);

        $userHasFriend = new UserFriendRequestRepository;
        $model = $userHasFriend->getByUserAndFriendId($request);
        
        $repositoryResponse = $userHasFriend->delete($model);
        
        if($repositoryResponse){
            $this->assertTrue(true,'VERIFY_DELETE_FRIEND');
        }

    }

}
