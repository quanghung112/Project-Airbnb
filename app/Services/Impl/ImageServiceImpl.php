<?php


namespace App\Services\Impl;


use App\Repositories\ImageRepositoryInterface;
use App\Services\ImageServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

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
       return $this->imageRepository->findById($id);
    }

    public function findByHouseId($id)
    {
        $this->imageRepository->findByHouseId($id);
    }
    public function create($data)
    {
        $fileName = str_random(15) . "-" . $data['house_id'] . "-" . Carbon::now()->toDateString() . "-" . Carbon::now()->hour . "-" . Carbon::now()->minute . "-" . Carbon::now()->second . "." . $data['image']->getClientOriginalExtension();
        $path = $data['image']->move(public_path('/image'), $fileName);
        $object = [
            'image' => $fileName,
            'house_id' => $data['house_id']
        ];
        $message = "Đăng bài thành công";
        $this->imageRepository->create($object);
        return $message;
    }

    public function update($data, $object)
    {
    }

    public function delete($id)
    {
        $image = $this->findById($id);
        $checkexist = public_path('/image/'.$image->image);
        if ($checkexist) {
            File::delete($checkexist);
        }
        $this->imageRepository->delete($image);
    }

    public function getImageOfHouse($houseId)
    {
        return $this->imageRepository->getImageOfPost($houseId);
    }

    public function deleteOfPost($houseId)
    {
        $images = $this->getImageOfHouse($houseId);
        if ($images){
            foreach ($images as $image){
                $checkexist = public_path('/image/'.$image->image);
                if ($checkexist) {
                    File::delete($checkexist);
                }
            }
        }
        $this->imageRepository->deleteOfPost($houseId);
    }
}
