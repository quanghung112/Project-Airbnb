<?php


namespace App\Repositories;


interface RepositoryInterface
{
    public function findById($id);

    public function create($data);
}
