<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\ImagePost;
use App\Services\HouseService;
use App\Services\ImageServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class HouseController extends Controller
{
    protected $houseService;
    protected $imageService;

    public function __construct(HouseService $houseService, ImageServiceInterface $imageService)
    {
        $this->houseService = $houseService;
        $this->imageService = $imageService;
    }

    public function getAll()
    {
        try {
            $houses = $this->houseService->getAll();
            return response()->json($houses, 200);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function findById($id)
    {
        try {
            $houses = $this->houseService->findById($id);
            return response()->json($houses, 200);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function create(PostRequest $request)
    {
        try {
            $this->houseService->create($request->all());
            $success = "Dữ liệu được thêm mới thành công!";
            return response()->json($success);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function saveImage(Request $request)
    {
        $data = $request->all();
        $message = $this->imageService->create($data);
        return response()->json(['message' => $message]);
    }

    public function getImageByHouse($id)
    {
//        try{
//            $images = $this->imageService->findByHouseId($id);
//            return response()->json($images);
//        }catch (\Exception $exception){
//            return $exception;
//        }
        $images = ImagePost::where('house_id', $id)->get();
        return response()->json($images);
    }

    public function getNewHouse($userId)
    {
        try {
            $house = $this->houseService->getNewHouse($userId);
            return response()->json($house);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function getHouseOfUser($userId)
    {
        try {
            $houses = $this->houseService->getHouseOfUser($userId);
            return response()->json($houses);
        } catch (\Exception $exception) {
            return $exception;
        }
    }


    public function getImageOfHouse($houseId)
    {
        try {
            $images = $this->imageService->getImageOfHouse($houseId);
            return response()->json($images);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function deleteImage($imageId)
    {
        try {
            $this->imageService->delete($imageId);
            $message = "Bạn đã xóa thành công";
            return response()->json($message);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function updatePost(PostRequest $request, $houseId)
    {
        try {
            $this->houseService->update($request->all(), $houseId);
            $message = "Cập nhật thành công ";
            return response()->json($message);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function deletePost($houseId)
    {
        try {
            $this->imageService->deleteOfPost($houseId);
            $this->houseService->delete($houseId);
            $message = "Bạn đã xóa bài đăng thành công";
            return response()->json($message);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function searchHouse(Request $request)
    {
        try {
            $houses = $this->houseService->searchHouse($request);
            return response()->json($houses);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function updateRevenue($houseId)
    {
        $this->houseService->updateRevenue($houseId);
    }

    public function updateCancelRevenue($houseId)
    {
        $this->houseService->updateCancelRevenue($houseId);
    }

    public function getComment($houseId)
    {
        try {
            $comments = $this->houseService->getCommentOfHouse($houseId);
            return response()->json($comments);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function getUsersComment($houseId)
    {
        try {
            $users = $this->houseService->getUsersComment($houseId);
            return response()->json($users);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
