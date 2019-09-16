<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(Request $request, $idHouse)
    {
        try {
            $this->commentService->create($request->all(), $idHouse);
            $message = "Comment thanh cong";
            return response()->json($message);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function update(Request $request, $idComment)
    {
        try {
            $message = $this->commentService->update($request->all(), $idComment);
            return response()->json($message);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function delete($idComment)
    {
        try {
            $message = $this->commentService->delete($idComment);
            return response()->json($message);

        } catch (\Exception $exception) {
            return $exception;
        }
    }

//    public function getUserComment($idHouse)
//    {
//        try {
//            $user = $this->commentService->getUserComment($idHouse);
//            return response()->json($user);
//
//        } catch (\Exception $exception) {
//            return $exception;
//        }
//    }

    public function updateTimeComment($idComment)
    {
        try {
             $this->commentService->updateTimeComment($idComment);
            return response()->json('success');

        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
