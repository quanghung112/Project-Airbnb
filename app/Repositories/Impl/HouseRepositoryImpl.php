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


    public function getNewHouse($userId)
    {
       return $this->model->where('user_id', $userId)->orderby('id','desc')->take(1)->get();
    }

    public function getHouseOfUser($userId)
    {
       $houses = $this->model->where('user_id', $userId)->orderby('id','desc')->get();
       return $houses;
    }
}
