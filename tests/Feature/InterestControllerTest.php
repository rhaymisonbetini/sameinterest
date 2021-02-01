<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InterestControllerTest extends TestCase
{
   
    /** @test */
    public function getAllInterestControllerTest()
    {
        $this->get('api/get-interest')->assertStatus(200);
    }

}
