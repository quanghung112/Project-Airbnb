<?php


namespace App\Services\Impl;

use App\Repositories\HouseRepositoryInterface;
use App\Services\HouseService;

class HouseServiceImpl implements HouseService
{
    private $houseRepository;
    public function __construct(HouseRepositoryInterface $houseRepository)
    {
        $this->houseRepository = $houseRepository;
    }

    public function create($request)
    {

    }
    public function update($request)
    {
        // TODO: Implement update() method.
    }
    public function delete($id)
    {
        // TODO: Implement destroy() method.
    }
    public function findById($id)
    {
        // TODO: Implement findById() method.
    }
}
