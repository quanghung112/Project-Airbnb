<?php


namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\UserRepositoryInterface;
use App\User;

class UserRepositoryImpl extends EloquentRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        $model = User::class;
        return $model;
    }

}