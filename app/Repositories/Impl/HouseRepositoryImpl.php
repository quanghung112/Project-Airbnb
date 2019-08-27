<?php


namespace App\Repositories\Impl;


use App\PostHouse;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\HouseRepositoryInterface;
use App\User;

class HouseRepositoryImpl extends EloquentRepository implements HouseRepositoryInterface
{
    public function getModel()
    {
        $model = PostHouse::class;
        return $model;
    }
}
