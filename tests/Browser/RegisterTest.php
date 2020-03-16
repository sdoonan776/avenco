<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{

    public function tests_that_registers_user_with_correct_details()
    {
        $user = factory(User::class)->create([
            'full_name' => 'jack',
            'email' => 'jack@example.com',
            'username' => 'jack334',
            'password' => 'password12345',
        ]);

        $this->browse(function (Browser $browser) use($user) {
            $browser->visit('/')
                    ->visit('/register')                    
                    ->type('full_name', $user->full_name)
                    ->type('email', $user->email)
                    ->type('username', $user->username)
                    ->type('password', $user->password)
                    ->type('confirm_password', 'password12345')
                    ->press('register')
                    ->assertPathIs('/login');
        });
    }
}
