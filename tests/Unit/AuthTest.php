<?php

namespace Tests\Unit;

use App\Http\Controllers\Auth\AuthController;
use Tests\TestCase;
use Illuminate\Http\Request;

class AuthTest extends TestCase
{


    /** @test */
    public function successLogin()
    {
        $request = ['email' => 'root@mail.com','password' => '123456'];
        $this->post('api/login',$request)->assertStatus(200);
    }

    /** @test */
    public function unauthorizedLogin()
    {
       $request = ['email' => 'roodfdft@mail.com','password' => '123456343'];
       $this->post('api/login',$request)->assertStatus(401);
    }

    /** @test */
    public function empityEmailLogin()
    {
        $request = ['email' => null,'password' => '123456'];
        $this->post('api/login',$request)->assertStatus(422);
    }

    /** @test */
    public function empityPasswordlLogin()
    {
        $request = ['email' => 'root@gmail.com','password' => null];
        $this->post('api/login',$request)->assertStatus(422);
    }   

  /** @test */
  public function empitylLogin()
  {
      $request = ['email' => null,'password' => null];
      $this->post('api/login',$request)->assertStatus(422);
  }  
  

}
