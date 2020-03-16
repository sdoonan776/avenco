<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryFilterService
{
	/**
	 * filters products by category in shop index
	 */
    public function filter()
    {
    	$categories = Category::all();

    	if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', fn($query) =>
                $query->where('category_id', request()->category_id)
            );
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
           $products = DB::table('products')->paginate(8);
           $categoryName =  'All Products';
        }   

        return $products = DB::table('products')->paginate(8);

    }

}