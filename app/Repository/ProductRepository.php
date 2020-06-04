<?php

namespace App\Repository;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    /**
     * Returns a list of products by category
     * @return mixed
     */
    public function getProductsByCategory()
    {
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', fn($query) =>
                $query->where('slug', request()->category)
            );
        } else {
            return Product::paginate(8);
        }
        return $products->paginate(8);
    }

}