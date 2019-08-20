<?php

namespace App\Providers;

use App\Repositories\Impl\UserRepositoryImpl;
use App\Repositories\UserRepositoryInterface;
use App\Services\Impl\UserServiceImpl;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserService::class, UserServiceImpl::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
