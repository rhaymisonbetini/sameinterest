<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserInterestControllerTest extends TestCase
{
     /** @test */
     public function getAllInterestControllerTest()
     {
         $this->get('api/get-user-interest')->assertStatus(200);
     }

}
