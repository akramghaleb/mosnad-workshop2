<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\RepositoryInterface;
use App\Repositories\BookRepository;
use App\Repositories\LoanRepository;
use App\Repositories\UserRepository;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoryInterface::class,UserRepository::class);
        $this->app->bind(RepositoryInterface::class,LoanRepository::class);
        $this->app->bind(RepositoryInterface::class,BookRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
