<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{

	public $fillable =	[
		'user_id',
		'email',
		'name',
		'address',
		'city',
		'province',
		'postalcode',
		'phone', 
		'name_on_card',
		'discount',
		'discount_code',
		'subtotal',
		'tax',
		'total',
		'payment_gateway',
		'shipped',
		'error'
	];

	public $cast = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime'
	];

	/**
	 * Get user who placed order
	 * @return BelongsTo
	 */
 	public function user(): BelongsTo
 	{
 	    return $this->belongsTo(User::class, 'user_id');
 	}

 	/**
	 * Get ordered product
	 * @return BelongsToMany
	 */
 	public function order(): BelongsToMany
 	{
 	    return $this->belongsToMany(Product::class, 'order_id');
 	}
}
