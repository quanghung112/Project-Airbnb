<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function findById($id){
        try{

            $user = $this->userService->findById($id);
            return response()->json($user, 200);
        }catch (\Exception $exception){
            return null;
        }
    }
}
