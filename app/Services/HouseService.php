<?php


namespace App\Services;


interface HouseService
{
    public function getAll();

    public function findById($id);

    public function create($request);

    public function update($request, $id);

    public function delete($obj);

    public function getNewHouse($userId);

    public function getHouseOfUser($userId);

    public function searchHouse($request);

    public function updateRevenue($idhouse);

    public function updateCancelRevenue($idhouse);

}

