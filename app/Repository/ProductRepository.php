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
	 * Constructor for ProductRepository
	 * @param Product $model
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
     * @param int $pagination
     * @return mixed
     */
    public function productPagination(int $pagination)
    {
        if (request()->category) {
            $products = $this->model::with('categories')->whereHas('categories', fn($query) =>
                $query->where('slug', request()->category)
            );
        } else {
            return $this->model->paginate($pagination);
        }
        return $products->paginate($pagination);
    }

    /**
     * Finds product by id
     * @param int $id
     * @return mixed
     */
    public function findProductById($id)
    {
    	return $this->findOneOrFail($id);
    }

    /**
     * Finds product by slug
     * @param $slug
     * @return mixed
     */
    public function findProductBySlug($slug)
    {
    	return $this->model::where('slug', $slug)->first();
    }

}
