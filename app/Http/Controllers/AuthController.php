<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\User;


class AuthController extends Controller
{
    public function register(UserRegisterRequest $request) {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        if(!$token = auth()->attempt($request->only(['email', 'password']))) {
            return abort(401);
        };

        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token,
            ],
        ]);
    }

    public function login(UserLoginRequest $request) {

        if(!$token = auth()->attempt($request->only(['email', 'password']))) {
            return response()->json([

                'errors' => [
                    'email' => ['Sorry, no such username or password']
                ]
                ], 422);
        };

        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token,
            ],
        ]);
    }
    public function user(Request $request) {
        return new UserResource($request->user());
    }

    public function logout() {
        auth()->logout();
    }
}
