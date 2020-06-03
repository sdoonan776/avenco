<?php
namespace App\Interfaces;

use App\Http\Requests\CheckoutRequest;

interface OrderRepositoryInterface
{
    
     /**
     * Stores the order request 
     * @param CheckoutRequest $request 
     * @param ?string $error
     * @return mixed
     */
    public function insertOrder(CheckoutRequest $request, ?string $error);    
}
