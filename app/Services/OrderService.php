<?php


namespace App\Services;


interface OrderService
{
    public function create($data);

    public function getUserOrderHouse($houseid);

    public function getHouseOrderOfUser($userid);

    public function update($data, $idOrder);

    public function findById($idOrder);

    public function getUser($idOrder);

    public function searchtime($data);

}
