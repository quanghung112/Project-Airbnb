<?php


namespace App\Repositories\Eloquent;

use App\Repositories\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }
    abstract function getModel();
    public function setModel()
    {
        $this->model= app()->make($this->getModel());
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }
    public function update($data, $object)
    {
        $object->update($data);
        return $object;
    }
}