<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\OrderService;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $orderService;

    public function __construct(UserService $userService, OrderService $orderService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
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
        return response()->json($success);
    }

    public function update(UpdateUserRequest $request)
    {
        try {
            $this->userService->update($request->all());
        } catch (\Exception $e) {
            return response()->json([
                "status" => "Error",
                "message" => $e->getMessage()
            ]);
        }
        return response()->json([
            "status" => "success",
            "message" => "update success"
        ]);
    }

    public function orderHouse(Request $request)
    {
        try {
            $message = $this->orderService->create($request->all());
            return response()->json([
                "status" => "success",
                "message" => $message
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "Error",
                "message" => $e->getMessage()
            ]);
        }
    }
}
