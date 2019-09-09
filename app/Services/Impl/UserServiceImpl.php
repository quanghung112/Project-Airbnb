<?php


namespace App\Services\Impl;


use App\Repositories\UserRepositoryInterface;
use App\Services\UserService;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
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
        $request['avatar'] = public_path('/avatar/notavatar.jpeg');
        $this->userRepositoryInterface->create($request);
    }


    public function update($request)
    {
        $oldUser = $this->getUser();
        if ($request['avatar'] != '') {
            $checkexist = public_path('/avatar/' . $oldUser->avatar);
            if ($checkexist) {
                File::delete($checkexist);
            }
            $fileName = $oldUser->id . "-" . Carbon::now()->toDateString() . "-" . Carbon::now()->hour . "-" . Carbon::now()->minute . "-" . Carbon::now()->second . "." . $request['avatar']->getClientOriginalExtension();
            $path = $request['avatar']->move(public_path('/avatar'), $fileName);
            $request['avatar'] = $fileName;
        } else {
            $request['avatar'] = $oldUser->avatar;
        }
        $this->userRepositoryInterface->update($request, $oldUser);
    }

    public function getUser()
    {
        return $this->userRepositoryInterface->getUser();
    }
}
