<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

	/**
	 * Gets order information
	 * @return BelongsTo
	 */
	public function order(): BelongsTo 
	{
		return $this->belongsTo(Order::class, 'order_id');
	}

	/**
	 * Get ordered products
	 * @return BelongsTo
	 */
	public function product(): BelongsTo
	{
		return $this->belongsTo(Product::class, 'product_id');
	}

}
