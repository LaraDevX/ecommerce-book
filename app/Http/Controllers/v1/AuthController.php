<?php

namespace App\Http\Controllers\v1;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserResource;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Interfaces\Services\v1\UserServiceInterface;

class AuthController extends Controller
{
    use ResponseTrait;
    public function __construct(protected UserServiceInterface $userService){

    }
    public function register(RegisterRequest $request){

        $user = $this->userService->registerUser($request->toArray());
        return $this->success(new UserResource($user), __('successes.user.created'), 201);
    }
    public function login(LoginRequest $request){
        $token = $this->userService->loginUser($request->all());
        return $this->success($token, __('successes.user.logged'));
    }
    public function findUser(Request $request){
        return $this->success(new UserResource($request->user()));
    }
    public function verifyEmail(Request $request){
        $message = $this->userService->verifyEmail($request->token);
        return $this->success([], $message);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return $this->success([], __('successes.user.logged_out'), 204);
    }
}
