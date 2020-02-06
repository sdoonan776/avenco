<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function it_logs_in_a_user_with_valid_credentials_and_redirects_to_home_page()
    {
        $response = $this->json('post', '/api/auth/login', 
            [
                'email' => 'kerluke.jake@example.com',
                'password' => 'secret',
            ]);
        $response->assertStatus(200);
        $repsonse->assertJsonStructure([
        	'info' => ['name']
        ]);
    }
}
