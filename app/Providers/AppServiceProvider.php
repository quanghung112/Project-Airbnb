<?php

namespace App\Providers;

use App\Repositories\HouseRepositoryInterface;
use App\Repositories\Impl\HouseRepositoryImpl;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Repositories\UserRepositoryInterface;
use App\Services\HouseService;
use App\Services\Impl\HouseServiceImpl;
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
        $this->app->singleton(HouseService::class, HouseServiceImpl::class);
        $this->app->singleton(HouseRepositoryInterface::class, HouseRepositoryImpl::class);
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
