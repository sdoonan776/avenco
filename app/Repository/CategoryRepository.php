<?php

namespace App\Repository;

use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
  
    /**
	 * gets all category names in shop index
     * @return
	 */
    public function listCategories()
    {
        return Category::with('products');
    }

    /**
     * Find a single category by slug
     *
     * @param $slug
     * @return Category
     */
    public function findBySlug($slug)
    {
        return Category::with('products')
            ->where('slug', $slug)
            ->first();
    }

    /**
     * Gets the name of the request category
     * @return mixed
     */
    public function getCategoryName()
    {
        if (request()->category) {
            return optional(Category::where('slug', request()->category)->first())->name;
        } else {
            return 'All Products';
        }
    }

    /**
     * Returns a list of products with the paginator by category
     * @return mixed
     */
    public function getProductsByCategory()
    {
        if (request()->category) {
            $products = Category::with('products')->whereHas('products', fn($query) =>
                $query->where('slug', request()->category)
            );
        } else {
            return Category::with('products');
        }

        return $products;
    }
}

