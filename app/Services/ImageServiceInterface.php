<?php


namespace App\Services;


interface ImageServiceInterface
{
    public function findById($id);

    public function create($data);

    public function update($request, $id);

    public function delete($id);

    public function deleteOfPost($houseId);

    public function getImageOfHouse($houseId);
}
