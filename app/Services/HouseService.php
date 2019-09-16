<?php


namespace App\Services;


interface HouseService
{
    public function getAll();

    public function findById($id);

    public function create($request);

    public function update($request, $id);

    public function delete($id);

    public function getNewHouse($userId);

    public function getHouseOfUser($userId);

    public function searchHouse($request);

    public function updateRevenue($idhouse);

    public function updateCancelRevenue($idhouse);

    public function getCommentOfHouse($houseId);

    public function getUsersComment($houseId);

    public function getImages($houseId);

    public function getOrders($houseId);

    public function getUser($houseId);

}

