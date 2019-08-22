<?php


namespace App\Services;


interface UserService
{
    public function findById($id);

    public function create($request);

}
