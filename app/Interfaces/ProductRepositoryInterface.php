<?php
namespace App\Interfaces;

interface ProductRepositoryInterface
{
    /**
     * Returns a list of products by category
     * @return mixed
     */
    public function getProductsByCategory();
}