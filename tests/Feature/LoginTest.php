<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function it_logs_in_a_user_with_valid_credentials()
    {
        $response = $this->json('post', '/login', 
            [
                'email' => 'dejuan.dooley@example.net',
                'password' => 'secret',
            ]);
        $response->assertStatus(200);
    }
}
