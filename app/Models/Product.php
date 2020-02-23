<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'quantity',
        'price',
        'product_image'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
       'created_at' => 'datetime',
       'updated_at' => 'datetime',
    ];

    public function categories(): BelongsTo
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function priceFormat()
    {
        return '£' . $this->price / 100;
    }
}
