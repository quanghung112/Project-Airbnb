<?php


namespace App\Services;


interface HouseService
{
    public function getAll();

    public function findById($id);

    public function create($request);

    public function update($request);

    public function delete($obj);

}
