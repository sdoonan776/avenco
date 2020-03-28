<?php

namespace App\Models;

use App\Models\Category;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Gets product category
     * @return [type] [description]
     */
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * 
     * @return [type] [description]
     */
    public function orders(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'product_id');
    }

}
