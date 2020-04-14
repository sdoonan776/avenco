<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        User::create([
            'full_name' => 'user',
            'email' => 'user@test.com',
            'username' => 'username',
            'password' => $password ?: $password = bcrypt('password'),
            'api_token' => Str::random(60),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'registered_at' => now()
        ]);
        factory(User::class, 100)->create();
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }        
}

