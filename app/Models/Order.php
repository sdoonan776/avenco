<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	public $fillable =	[
		'user_id',
		'billing_email',
		'billing_name',
		'billing_address',
		'billing_city',
		'billing_province',
		'billing_postalcode',
		'billing_phone', 
		'billing_name_on_card',
		'billing_discount',
		'billing_discount_code',
		'billing_subtotal',
		'billing_tax',
		'billing_total',
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
