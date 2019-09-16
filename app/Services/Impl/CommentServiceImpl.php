<?php


namespace App\Services\Impl;


use App\Repositories\CommentRepositoryInterface;
use App\Services\CommentService;
use Carbon\Carbon;

class CommentServiceImpl implements CommentService
{
    protected $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function create($request, $idHouse)
    {
        $request['house_id'] = $idHouse;
        $request['time_comment'] = 'just now';
        $this->commentRepository->create($request);
        $message = 'Comment thanh cong';
        return $message;
    }

    public function update($request, $id)
    {
        $comment = $this->findById($id);
        $this->commentRepository->update($request, $comment);
        $message = 'Update thanh cong';
        return $message;
    }

    public function delete($id)
    {
        $comment = $this->findById($id);
        $this->commentRepository->delete($comment);
        $message = 'Success';
        return $message;
    }

    public function findById($id)
    {
        return $this->commentRepository->findById($id);
    }


//    public function getUserComment($idComment)
//    {
//        $comment = $this->findById($idComment);
//        $user = $this->commentRepository->getUserComment($comment);
//        return $user;
//    }

    public function updateTimeComment($idComment)
    {
        $comment = $this->findById($idComment);
        $now = Carbon::now();
        $dayComment = Carbon::parse($comment->created_at);
        $data['time_comment'] = $dayComment->diffForHumans($now);
        $this->commentRepository->update($data, $comment);
    }
}
