<?php


namespace App\Services;


interface HouseService
{
    public function findById($id);

    public function create($request);

    public function update($request, $id);

    public function delete($obj);

}

