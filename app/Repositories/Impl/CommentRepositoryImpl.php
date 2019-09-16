<?php


namespace App\Repositories\Impl;


use App\Comment;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\Eloquent\EloquentRepository;

class CommentRepositoryImpl extends EloquentRepository implements CommentRepositoryInterface
{

    function getModel()
    {
        $model = Comment::class;
        return $model;
    }

    public function getUserComment($comment)
    {
        return $comment->user;
    }
}
