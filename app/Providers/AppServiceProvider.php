<?php

namespace App\Providers;

use App\Services\v1\UserService;
use App\Repositories\v1\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Services\v1\UserServiceInterface;
use App\Interfaces\Repositories\v1\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
