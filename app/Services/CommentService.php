<?php


namespace App\Services;


interface CommentService
{
    public function create($request, $idHouse);

    public function update($request, $id);

    public function delete($id);

    public function findById($id);

//    public function getUserComment($idComment);

    public function updateTimeComment($idComment);
}
