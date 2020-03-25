<?php

namespace App\Repository;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Repository\BaseRepository;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

	protected $model;

	/**
	 * Contructor for ProductRepository
	 * @param Product $model [description]
	 */
    public function __construct(Product $model)
    {
    	parent::__construct($model);
    	$this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']) 
    {
    	return $this->all($order, $sort, $columns);
    }

    /**
     * Returns a list of products with the paginator
     * @return mixed
     */
    public function productPagination()
    {
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', fn($query) =>
                $query->where('slug', request()->slug)
            );    
        } else {
            return DB::table('products')->paginate(8);
        }

        return $products->paginate(8);
        
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findProductById(int $id)
    {
    	return $this->findOneOrFail($id);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findProductBySlug($slug)
    {
    	$product = Product::where('slug', $slug)->first();
    	return $product;
    }
}
