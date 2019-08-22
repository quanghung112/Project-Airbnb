<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function findById($id)
    {
        try {


            $user = $this->userService->findById($id);
            return response()->json($user, 200);
        } catch (\Exception $exception) {
            return null;
        }
    }


    public function create(RegisterRequest $request)
    {
        $this->userService->create($request->all());
        $success = "Dữ liệu được xác thực thành công!";
        return $success;
    }

    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $this->userService->update($request->all(), $id);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "Error",
                "message" => $e->getMessage()
            ]);
        }
        return response()->json([
            "status" => "seccuss",
            "message" => "update success"
        ]);
    }

}
