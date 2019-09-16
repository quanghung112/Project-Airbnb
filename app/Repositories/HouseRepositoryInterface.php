<?php


namespace App\Repositories;


interface HouseRepositoryInterface extends RepositoryInterface
{
    public function getNewHouse($userId);

    public function getHouseOfUser($userId);

    public function searchHouse($request);

    public function getCommentOfHouse($obj);

    public function getImages($house);

    public function getOrders($house);

}
