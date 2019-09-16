<?php


namespace App\Services\Impl;


use App\Repositories\OrderRepositoryInterface;
use App\Services\HouseService;
use App\Services\OrderService;
use App\Services\UserService;
use Carbon\Carbon;

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
//        $data['status'] = '1';
        $allOrder = $this->orderRepository->getAll();
        if (count($allOrder) != 0) {
            foreach ($allOrder as $order) {
                if ($order->user_id == $data['user_id'] && $order->house_id == $data['house_id']) {
                    $now = Carbon::now();
                    $checkDay = Carbon::create(2000, 1, 1, 00, 00, 00);
                    $endLoan = Carbon::parse($order->check_out);
                    $checkNow = $now->diffInHours($checkDay);
                    $checkEndLoan = $endLoan->diffInHours($checkDay);
                    $check = $checkEndLoan - $checkNow;
                    if ($check > 0) {
                        if ($order->status === '2' || $order->status === '1') {
                            $message = "Đã đặt phòng thành công không thể đặt lại";
                            $status = false;
                            $result = [$message, $status];
                            return $result;
                        }
                    }
                } else {
                    $this->orderRepository->create($data);
                    $message = "Đặt nhà thành công";
                    $status = true;
                    $result = [$message, $status];
                    return $result;
                }
            }
        } else {
            $this->orderRepository->create($data);
            $message = "Đặt nhà thành công";
            $status = true;
            $result = [$message, $status];
            return $result;
        }
    }

    public function getUserOrderHouse($houseid)
    {
        $orders = $this->orderRepository->getUserOrderHouse($houseid);
        $usersOrder = [];
        if ($orders) {
            foreach ($orders as $order) {
                $user = $this->userService->findById($order->user_id);
                if ($usersOrder != []) {
                    foreach ($usersOrder as $userOrder) {
                        $check = true;
                        if ($userOrder->id === $user->id) {
                            $check = false;
                            break;
                        }
                    }
                    if ($check) {
                        array_push($usersOrder, $user);
                    }
                } else {
                    array_push($usersOrder, $user);
                }

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
                if ($housesOrder != []) {
                    foreach ($housesOrder as $houseOrder) {
                        $check = true;
                        if ($houseOrder->id === $house->id) {
                            $check = false;
                            break;
                        }
                    }
                    if ($check) {
                        array_push($housesOrder, $house);
                    }
                } else {
                    array_push($housesOrder, $house);
                }
            }
        }
        return [$housesOrder, $orders];
    }

    public function update($data, $idOrder)
    {
        $order = $this->findById($idOrder);
        $usersOrder = $this->getUserOrderHouse($order->house_id);
        foreach ($usersOrder[0] as $orderUser) {
            if ($orderUser->status === '2') {
                if ($data['status'] === '2') {
                    $message = "Đã chấp nhận người thuê không thể chấp nhận cho người khác";
                    $status = false;
                    return [$message, $status];
                }
            }
        }
        $houseOrder = $order->house;
        $now = Carbon::now();
        $checkDay = Carbon::create(2000, 1, 1, 00, 00, 00);
        $startLoan = Carbon::parse($order->check_in);
        $checkNow = $now->diffInHours($checkDay);
        $checkStartLoan = $startLoan->diffInHours($checkDay);
        $check = $checkStartLoan - $checkNow;
        if ($check > 0 and $check < 24) {
            if ($data['userId']) {
                if ($order->status === '2') {
                    $message = "Bạn không thể  huỷ thuê nhà trong vòng 1 ngày trước thời gian thuê ";
                    $status = false;
                    return [$message, $status];
                }
            } else {
                $this->orderRepository->update($data, $order);
                $message = "Thành công";
                $status = true;
                return [$message, $status];
            }
        }
        if ($check < 0) {
            $message = "Không thể thay đổi trạng thái thuê nhà do đã quá ngày nhận phòng";
            $status = false;
            return [$message, $status];
        }
        $this->orderRepository->update($data, $order);
        $message = "Thành công";
        $status = true;
        return [$message, $status];
    }

    public function findById($idOrder)
    {
        return $this->orderRepository->findById($idOrder);
    }

    public function getUser($idOrder)
    {
        $order = $this->findById($idOrder);
        return $this->orderRepository->getUser($order);
    }
}
