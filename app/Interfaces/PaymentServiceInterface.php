<?php
namespace App\Interfaces;

interface PaymentServiceInterface 
{
    /**
     * Processes the payment
     * @return mixed
     */
    public function processPayment($request);
}