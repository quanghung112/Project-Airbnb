<?php

namespace App\Http\Controllers;

use App\Services\HouseService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    protected $houseService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getUserOrderHouse($houseId)
    {
        try {
            $users = $this->orderService->getUserOrderHouse($houseId);
            return response()->json($users);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function getHouseOrderOfUser($userId)
    {
        try {
            $houses = $this->orderService->getHouseOrderOfUser($userId);
            return response()->json($houses);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function updateOrder(Request $request, $idOrder)
    {
        try {
            $message = $this->orderService->update($request->all(), $idOrder);
            return response()->json($message);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
    public function searchTime(Request $request){
        try{
            $orders = $this->orderService->searchtime($request);
            return response()->json($orders);
        }catch (\Exception $exception) {
            return $exception;
        }
    }
}
