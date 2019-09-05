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
        $this->orderRepository->create($data);
        $message = "Đặt nhà thành công";
        return $message;
    }


    public function getUserOrderHouse($houseid)
    {
        $idUsers = $this->orderRepository->getUserOrderHouse($houseid);
//        dd($idUsers);
        $usersOrder = [];
        if ($idUsers) {
            foreach ($idUsers as $idUser) {
                $user = $this->userService->findById($idUser->user_id);
                array_push($usersOrder, $user);
            }
        }
        return $usersOrder;
    }

    public function getHouseOrderOfUser($userid)
    {
        $idHouses = $this->orderRepository->getHouseOrderOfUser($userid);
        $housesOrder = [];
        if ($idHouses) {
            foreach ($idHouses as $idHouse) {
                $house = $this->houseService->findById($idHouse->house_id);
                array_push($housesOrder, $house);
            }
        }
        return $housesOrder;
    }
}
