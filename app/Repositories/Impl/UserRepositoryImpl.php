<?php


namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepositoryImpl extends EloquentRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        $model = User::class;
        return $model;
    }

    public function getUser(){
        $user = Auth::user();
        return $user;
    }

}
