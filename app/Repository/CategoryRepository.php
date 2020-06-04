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
        return Category::all();
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
}

