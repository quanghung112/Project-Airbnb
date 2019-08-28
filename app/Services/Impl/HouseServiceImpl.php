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
    public function update($request, $id)
    {
        $house = $this->findById($id);
        $this->houseRepository->update($house);
    }
    public function delete($id)
    {

    }
    public function findById($id)
    {
        return $this->houseRepository->findById($id);
    }
}
