<?php


namespace App\Repositories;


interface ImageRepositoryInterface extends RepositoryInterface
{
    public function findByHouseId($id);
}
