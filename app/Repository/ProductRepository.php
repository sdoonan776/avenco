<?php

namespace App\Repository;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Repository\BaseRepository;

class ProductRepository extends BaseRespository implements ProductRepositoryInterface
{

	protected Product $model;

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
