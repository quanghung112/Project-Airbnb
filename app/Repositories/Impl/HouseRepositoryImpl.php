<?php


namespace App\Repositories\Impl;


use App\House;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\HouseRepositoryInterface;

class HouseRepositoryImpl extends EloquentRepository implements HouseRepositoryInterface
{
    public function getModel()
    {
        $model = House::class;
        return $model;
    }
}