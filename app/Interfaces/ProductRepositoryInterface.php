<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{	
	/**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * Returns a list of products with the paginator
     * @return mixed
     */
    public function productPagination();

    /**
     * @param int $id
     * @return mixed
     */
    public function findProductById(int $id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findProductBySlug($slug);
}