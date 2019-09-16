<?php


namespace App\Repositories\Impl;


use App\Order;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\OrderRepositoryInterface;

class OrderRepositoryImpl extends EloquentRepository implements OrderRepositoryInterface
{

    function getModel()
    {
        $model = Order::class;
        return $model;
    }

    public function getUserOrderHouse($houseid)
    {
        return $this->model->where('house_id', $houseid)->get();
    }

    public function getHouseOrderOfUser($userid)
    {
        return $this->model->where('user_id', $userid)->get();
    }

    public function getUser($order)
    {
        return $order->user;
    }
}
