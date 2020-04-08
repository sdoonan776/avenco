<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
	protected $table = 'order_product';

    protected $fillable = [
    	'order_id', 'product_id', 'price', 'quantity'
    ];

    protected $cast = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime'
	];
}
