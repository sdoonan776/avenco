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
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCategoryById(int $id);
    
    /**
     * @return mixed
     */
    public function treeList();

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);

    /**
     * Gets the name of the request category
     * @return mixed
     */
    public function getCategoryName();
}