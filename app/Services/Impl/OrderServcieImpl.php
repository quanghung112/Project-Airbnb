<?php


namespace App\Services\Impl;


use App\Repositories\OrderRepositoryInterface;
use App\Services\HouseService;
use App\Services\OrderService;
use App\Services\UserService;

class OrderServcieImpl implements OrderService
{
    protected $orderRepository;
    protected $userService;
    protected $houseService;

    public function __construct(OrderRepositoryInterface $orderRepository, UserService $userService, HouseService $houseService)
    {
        $this->orderRepository = $orderRepository;
        $this->userService = $userService;
        $this->houseService = $houseService;
    }

    public function create($data)
    {
        $data['status'] = "0";
        $this->orderRepository->create($data);
        $message = "Đặt nhà thành công";
        return $message;
    }


    public function getUserOrderHouse($houseid)
    {
        $orders = $this->orderRepository->getUserOrderHouse($houseid);
        $usersOrder = [];
        if ($orders) {
            foreach ($orders as $order) {
                $user = $this->userService->findById($order->user_id);
                array_push($usersOrder, $user);
            }
        }
        return [$usersOrder, $orders];
    }

    public function getHouseOrderOfUser($userid)
    {
        $orders = $this->orderRepository->getHouseOrderOfUser($userid);
        $housesOrder = [];
        if ($orders) {
            foreach ($orders as $order) {
                $house = $this->houseService->findById($order->house_id);
                array_push($housesOrder, $house);
            }
        }
        return [$housesOrder, $orders];
    }

    public function update($data, $idOrder)
    {
        $order = $this->findById($idOrder);
        $result = $this->getUserOrderHouse($order->house_id);
        foreach ($result[0] as $orderUser) {
            if ($orderUser->status === '2') {
                if ($data['status'] === '2') {
                    $message = "Đã chấp nhận người thuê không thể chấp nhận cho người khác";
                    return $message;
                }
            }
        }
        $this->orderRepository->update($data, $order);
        $message = "Thành công";
        return $message;
    }

    public function findById($idOrder)
    {
        return $this->orderRepository->findById($idOrder);
    }
}
