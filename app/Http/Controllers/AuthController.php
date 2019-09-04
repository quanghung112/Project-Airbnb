<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['status' => false, 'message' => 'Mat khau or email khong dung'] );
            }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        $userid = Auth::user()->id;
        return response()->json(['status' => true,
            'token' => $token,
            'idUser' => $userid], Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json('You have successfully logged out.');
        } catch (JWTException $e) {
            return response()->json('Failed to logout, please try again.');
        }
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {

            return response()->json("Your current password does not matches with the password you provided. Please try again.");
        }
        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return response()->json("New Password cannot be same as your current password. Please choose a different password.");
        }
        if ($request->get('new_password') != $request->get('new_password_confirmation')) {
            return response()->json("Nhập lại mật khẩu mới chưa đúng");
        }
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);
        $user = Auth::user();
        $user->password = \Illuminate\Support\Facades\Hash::make($request->get('new_password'));
        $user->save();
        return response()->json("Password changed successfully !");
    }

    public function loginWithFacebook(Request $request)
    {
        $authUser = $this->findOrCreateUser($request);
        $token = JWTAuth::fromUser($authUser);
        $userid = $authUser->id;
        return response()->json(['status' => true,
            'token' => $token,
            'idUser' => $userid], Response::HTTP_OK);
    }

    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('provider_id', $facebookUser->id)->first();

        if ($authUser) {
            return $authUser;
        }
        $password=Hash::make('123456');
        return User::create([
            'username' => $facebookUser->name,
            'name' => $facebookUser->name,
            'password' => $password,
            'email' => $facebookUser->email,
            'provider_id' => $facebookUser->id,
            'provider' => $facebookUser->id,
            'avatar' => $facebookUser->photoUrl
        ]);
    }

    public function getUser(){
        try {
            $user = $this->userService->getUser();
            return response()->json($user, 200);
        } catch (\Exception $exception) {
            return null;
        }
    }
}
