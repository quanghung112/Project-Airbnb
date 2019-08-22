<?php


namespace App\Services\Impl;


use App\Repositories\UserRepositoryInterface;
use App\Services\UserService;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService
{
    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function findById($id)
    {
        $user = $this->userRepositoryInterface->findById($id);
        return $user;
    }

    public function create($request)
    {
        $request['password'] = Hash::make($request['password']);
        $this->userRepositoryInterface->create($request);

    }
}
