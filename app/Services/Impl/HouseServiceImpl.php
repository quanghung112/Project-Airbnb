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
    public function getAll()
    {
        $houses = $this->houseRepository->getAll();
        return $houses;
    }

    public function create($request)
    {
        $this->houseRepository->create($request);
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
        $house = $this->houseRepository->findById($id);
        return $house;
    }
}
