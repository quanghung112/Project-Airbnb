<?php


namespace App\Repositories\Impl;


use App\Order;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\OrderRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Services\HouseService;

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
    public function searchtime($data)
    {
        $userId = Auth::user()->id;
        $start_loan = $data->start_loan;
        if ($start_loan == "") {
            $start_loan = "2000-01-01";
        };
        $end_loan = $data->end_loan;
        if ($end_loan == "") {
            $end_loan = "2999-01-01";
        };
        $from = date($start_loan);
        $to = date($end_loan);

        $orders = $this->model->where('userofhome', $userId)
            ->where('status', '2')
            ->whereBetween('check_out', [$from, $to])->get();
        return $orders;
    }
}
