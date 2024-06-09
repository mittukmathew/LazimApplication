<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testLogin()
    {
        $response = $this->post('/login', [
            'email' => 'rose@yopmail.com',
            'password' => 'rose123',
        ]);

        $response->assertStatus(200);
    }

}
