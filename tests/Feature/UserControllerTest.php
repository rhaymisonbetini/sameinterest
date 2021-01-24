<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    
    /** @test */
    public function getUserByIdSuccess()
    {
        $this->get('/api/user/2')->assertStatus(200);
    }

       
    /** @test */
    public function getUserByIdNotFound()
    {
        $this->get('/api/user/hereunespectedId')->assertStatus(404);
    }
    
}
