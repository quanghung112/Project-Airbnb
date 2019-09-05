<?php


namespace App\Repositories;


interface OrderRepositoryInterface extends RepositoryInterface
{
    public function getUserOrderHouse($houseid);

    public function getHouseOrderOfUser($userid);
}
