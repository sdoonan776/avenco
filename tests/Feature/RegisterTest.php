<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function registers_a_user_with_valid_credentials()
    {
        $response = $this->post('/api/auth/register', 
            [
                'name' => 'jack',
                'email' => 'jack@example.com',
                'username' => 'jack334',
                'password' => 'secret12345',
                'password_confirmation' => 'secret12345'
            ])
        ->assertStatus(200);
    }
}
