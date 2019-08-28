<?php

namespace App\Http\Controllers;

use App\Services\HouseService;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    protected $houseService;

    public function __construct(HouseService $houseService)
    {
        $this->houseService = $houseService;
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
    public function create(Request $request){
        try{
            $this->houseService->create($request->all());
            $success = "Dữ liệu được thêm mới thành công!";
            return response()->json($success);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
