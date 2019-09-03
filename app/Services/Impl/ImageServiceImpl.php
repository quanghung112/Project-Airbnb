<?php


namespace App\Services\Impl;


use App\Repositories\ImageRepositoryInterface;
use App\Services\ImageServiceInterface;
use Carbon\Carbon;

class ImageServiceImpl implements ImageServiceInterface
{
    public $imageRepository;
    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function findByHouseId($id)
    {
        $this->imageRepository->findByHouseId($id);
    }
    public function create($data)
    {
        $fileName=str_random(15)."-".$data['house_id']."-".Carbon::now()->toDateString()."-".Carbon::now()->hour."-".Carbon::now()->minute."-".Carbon::now()->second.".".$data['image']->getClientOriginalExtension();
        $path = $data['image']->move(public_path('/image'), $fileName);
        $object = [
            'image'=>$fileName,
            'house_id'=>$data['house_id']
        ];
        $message = "Đăng bài thành công";
        $this->imageRepository->create($object);
        return $message;
    }

    public function update($data, $object)
    {
        // TODO: Implement update() method.
    }

    public function delete($obj)
    {
        // TODO: Implement delete() method.
    }
}
