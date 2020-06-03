<?php

namespace App\Providers;

use App\Services\StripeService;
use App\Repository\OrderRepository;
use App\Repository\CategoryRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\PaymentServiceInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryRepositoryInterface::class => CategoryRepository::class,
        OrderRepositoryInterface::class => OrderRepository::class,
        PaymentServiceInterface::class => StripeService::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}
