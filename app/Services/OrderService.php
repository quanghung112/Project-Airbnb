<?php


namespace App\Services;


interface OrderService
{
    public function create($data);

    public function getUserOrderHouse($houseid);

    public function getHouseOrderOfUser($userid);

}
