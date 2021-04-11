<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        static $password;
        $role_admin = Role::create(['name' => Role::ROLE_ADMIN]);

         $admin = User::create(
            [
                'full_name' => 'admin',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => $password ?: $password = bcrypt('adminpassword'),
                'api_token' => Str::random(60),
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),
                'registered_at' => now()
            ]
        );

        User::create([
            'full_name' => 'user',
            'email' => 'user@test.com',
            'username' => 'username',
            'password' => $password ?: $password = bcrypt('password12345'),
            'api_token' => Str::random(60),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'registered_at' => now()
        ]);

        $admin->roles()->sync([$role_admin->id]);

        User::factory()->count(100)->create();
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}

