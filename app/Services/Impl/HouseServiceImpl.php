<?php


namespace App\Services\Impl;

use App\Repositories\CommentRepositoryInterface;
use App\Repositories\HouseRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Services\HouseService;
use App\Services\UserService;
use Carbon\Carbon;

class HouseServiceImpl implements HouseService
{
    private $houseRepository;
    private $commentRepository;
    private $orderRepository;
    private $imageRepository;
    public function __construct(HouseRepositoryInterface $houseRepository,
                                CommentRepositoryInterface $commentRepository,
                                OrderRepositoryInterface $orderRepository,
                                ImageRepositoryInterface $imageRepository)
    {
        $this->houseRepository = $houseRepository;
    }
    public function getAll()
    {
        $houses = $this->houseRepository->getAll();
        return $houses;
    }

    public function create($request)
    {
        $this->houseRepository->create($request);
    }
    public function update($request, $id)
    {
        $house = $this->findById($id);
        $this->houseRepository->update($request, $house);
    }
    public function delete($id)
    {
        $house = $this->findById($id);
        $this->houseRepository->delete($house);
    }
    public function findById($id)
    {
        return $this->houseRepository->findById($id);
    }

    public function getImages($houseId)
    {
       $house = $this->findById($houseId);
       return $this->houseRepository->getImages($house);
    }

    public function getNewHouse($userId)
    {
       return $this->houseRepository->getNewHouse($userId);
    }

    public function getHouseOfUser($userId)
    {
        return $this->houseRepository->getHouseOfUser($userId);
    }
    public function searchHouse($request){
        return $this->houseRepository->searchHouse($request);
    }
    public function updateRevenue($idhouse){
        $house = $this->findById($idhouse);
        $startLoan = Carbon::create($house->start_loan);
        $endLoan = Carbon::create($house->end_loan);
        $start = $startLoan->diffInDays($endLoan);
        $revenue = $start * $house->price;
        $data = ["revenue" => $revenue];
        $this->houseRepository->update($data, $house);

    }
    public function updateCancelRevenue($idhouse){
        $house = $this->findById($idhouse);
        $data = ["revenue" => ''];
        $this->houseRepository->update($data, $house);
    }

    public function getCommentOfHouse($houseId)
    {
       $house = $this->findById($houseId);
       $comments = $this->houseRepository->getCommentOfHouse($house);
       return $comments;
    }

    public function getUsersComment($houseId)
    {
        $comments = $this->getCommentOfHouse($houseId);
        $usersComment = [];
        if ($comments) {
            foreach ($comments as $comment) {
                $user = $comment->user;
                if ($usersComment != []) {
                    foreach ($usersComment as $userComment) {
                        $check = true;
                        if ($userComment->id === $user->id) {
                            $check = false;
                            break;
                        }
                    }
                    if ($check) {
                        array_push($usersComment, $user);
                    }
                } else {
                    array_push($usersComment, $user);
                }

            }
        }
        return $usersComment;
    }

    public function getOrders($houseId)
    {
        $house = $this->findById($houseId);
        return $this->getOrders($house);
    }

    public function getUser($houseId)
    {
        $house = $this->findById($houseId);
        return $this->houseRepository->getUser($house);
    }

}
