<?php


namespace App\Services;


interface ImageServiceInterface
{
    public function findById($id);

    public function create($data);

    public function update($request, $id);

    public function delete($obj);

    public function findByHouseId($id);
}
