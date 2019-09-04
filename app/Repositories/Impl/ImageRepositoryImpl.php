<?php


namespace App\Repositories\Impl;


use App\ImagePost;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\ImageRepositoryInterface;

class ImageRepositoryImpl extends EloquentRepository implements ImageRepositoryInterface
{

    function getModel()
    {
        $model = ImagePost::class;
        return $model;
    }


    public function findByHouseId($id)
    {
        $images = $this->model->where('house_id', $id)->get();
        return $images;
    }
    function getImageOfPost($houseId)
    {
        return $this->model->where('house_id', $houseId)->get();
    }

    function deleteOfPost($houseId)
    {
        $this->model->where('house_id', $houseId)->delete();

    }
}
