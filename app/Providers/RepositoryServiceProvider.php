<?php

namespace App\Providers;

use App\Repository\UserInterface;
use App\Repository\UserRepository;
use App\Repository\ProductInterface;
use App\Repository\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class,UserRepository::class);
        $this->app->bind(ProductInterface::class,ProductRepository::class);
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
