<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Model
{
	protected $table = 'order_products';

    protected $fillable = [
    	'order_id', 'product_id', 'price', 'quantity'
    ];

    protected $cast = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime'
	];

	/**
	 * Get ordered product
	 * @return BelongsTo
	 */
	public function product(): BelongsTo
	{
		return $this->belongsTo(Product::class, 'product_id');
	}

}
