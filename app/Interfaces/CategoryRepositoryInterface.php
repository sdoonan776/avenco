<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
	/**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCategories();
    
    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);

    /**
     * Returns a list of products with the paginator by category
     * @return mixed
     */
    public function getProductsByCategory();
}