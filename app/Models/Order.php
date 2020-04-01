<?php

namespace App\Models;

use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
	public $table = 'orders';

	protected $fillable =	[
		'user_id',
		'email',
		'name',
		'address_1',
		'address_2',
		'city',
		'country',
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

	protected $cast = [
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
	 * @return HasMany
	 */
 	public function product(): HasMany
 	{
 	    return $this->hasMany(OrderProduct::class, 'order_id');
 	}
}
