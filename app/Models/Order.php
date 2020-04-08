<?php

namespace App\Models;

use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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
	 * @return BelongsToMany
	 */
 	public function products(): BelongsToMany
 	{
 	    return $this->belongsToMany(Product::class)->withPivot('quantity');
 	}

}
