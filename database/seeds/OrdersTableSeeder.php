<?php

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
        	'user_id' => 1,
			'email' => 'user@test.com',
			'name' => 'test',
			'address_1' => '123 Test Street',
			'address_2' => 'Test Town',
			'city' => 'Test City',
			'country' => 'GB',
			'postalcode' => 'BT36 2UE',
			'phone' => '909283948787128738', 
			'name_on_card' => 'MR T TEST',
			'discount' => 0,
			'discount_code' => null,
			'subtotal' => 6023,
			'tax' => 768,
			'total' => 6806,
			'payment_gateway' => 'stripe',
			'shipped' => 0,
			'error' => null
        ]);

        OrderProduct::create([
        	'order_id' => 1,
        	'product_id' => 1,
        	'quantity' => 1,
        ]);
    }
}
