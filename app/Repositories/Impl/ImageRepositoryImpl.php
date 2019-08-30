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
}
