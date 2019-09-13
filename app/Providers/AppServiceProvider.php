<?php

namespace App\Providers;

use App\Repositories\CommentRepositoryInterface;
use App\Repositories\HouseRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;
use App\Repositories\Impl\CommentRepositoryImpl;
use App\Repositories\Impl\HouseRepositoryImpl;
use App\Repositories\Impl\ImageRepositoryImpl;
use App\Repositories\Impl\OrderRepositoryImpl;
use App\Repositories\Impl\UserRepositoryImpl;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\CommentService;
use App\Services\HouseService;
use App\Services\ImageServiceInterface;
use App\Services\Impl\CommentServiceImpl;
use App\Services\Impl\HouseServiceImpl;
use App\Services\Impl\ImageServiceImpl;
use App\Services\Impl\OrderServcieImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\OrderService;
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
        $this->app->singleton(ImageRepositoryInterface::class, ImageRepositoryImpl::class);
        $this->app->singleton(ImageServiceInterface::class, ImageServiceImpl::class);
        $this->app->singleton(OrderRepositoryInterface::class, OrderRepositoryImpl::class);
        $this->app->singleton(OrderService::class, OrderServcieImpl::class);
        $this->app->singleton(CommentRepositoryInterface::class, CommentRepositoryImpl::class);
        $this->app->singleton(CommentService::class, CommentServiceImpl::class);
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
