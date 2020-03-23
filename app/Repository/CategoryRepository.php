<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Product;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository implements CateogryRepositoryInterface
{
    protected Category $model;

    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
	 * gets all category names in shop index
     * @return
	 */
    public function all()
    {
    	$categories = Category::all();

        if (request()->category) {
            return $categories;
        }

    	return $categories;
    }

    /**
     * filters products by category
     * @return 
     */
    public function filterProductsByCategory()
    {
        $categories = Category::all();

    	if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query){
                $query->where('category_id', request()->category_id);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;            
        } else {
           $products = DB::table('products')->paginate(8);
           $categoryName =  'All Products';
        }   

        $products = $products->paginate(8);

        return [
            'products' => $products,
            'categoryName' => $categoryName,
            'categories' => $categories
        ];
    }
    /**
     * get category name
     * @return string
     */
    public function getCategoryName(): string
    {
        // $categories = Category::all();

        if (request()->category) {
            return $this->categories->where('slug', request()->category)->first()->name;
        } else {
            return 'All Products'; 
        }
    }
}

