<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements RepositoryInterface
{
    /**
	 * gets all category names in shop index
     * @return Category
	 */
    public function all(): Category
    {
    	$categories = Category::all();
    	return $categories;
    }

    /**
     * filters products by category
     * @return
     */
    public function filterProductsByCategory(): 
    {
    	if (request()->category) {
            return $products = Product::with('categories')->whereHas('categories', fn($query) =>
                $query->where('category_id', request()->category_id)
            );
        } else {
           return $products = DB::table('products')->paginate(8);
        }   

        return $products = $products->paginate(8);
    }
    /**
     * get category name
     * @return string
     */
    public function getCategoryName(): string
    {
        if (request()->category) {
            return $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            return $categoryName =  'All Products';
        }
    }
}

