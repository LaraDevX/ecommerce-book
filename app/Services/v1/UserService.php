<?php

namespace App\Services\v1;

use App\DTO\UserDTO;
use Illuminate\Support\Str;
use App\Services\BaseService;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Services\UserServiceInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserService extends BaseService implements UserServiceInterface
{

    public function __construct(protected UserRepositoryInterface $userRepository)
    {
        //
    }
    public function registerUser($userData){
        $data = [
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']),
            'verification_token' => Str::random(20)
        ];
        return $this->userRepository->createUser($data);
    }
    public function loginUser($data){
        $user = $this->userRepository->getUserByEmail($data['email']);
        if(!$user || !Hash::check($data['password'], $user->password)){
            return $this->error(__('errors.user.not_found'), 404);
        }
        if($user->email_verified_at == null){
            return $this->error(__('errors.email.not_verified'), 403);
        }
        return $user->createToken('login')->plainTextToken;

    }

    public function verifyEmail($token){
        $this->userRepository->findUserByToken($token);
        return __('successes.email.verified');
    }
}
