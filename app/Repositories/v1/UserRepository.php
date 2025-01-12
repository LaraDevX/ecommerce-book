<?php

namespace App\Repositories\v1;

use App\Models\User;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Str;
use App\Interfaces\Repositories\v1\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function createUser($data){
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->verification_token = $data['verification_token'];
        $user->save();
        SendEmailJob::dispatch($user);
        return $user->load('role');
    }
    public function getUserByEmail($email){
        return User::where('email', $email)->firstOrFail();
    }
    public function findUserByToken($token){
        $user = User::where('verification_token', $token)->firstOrFail();
        $user->email_verified_at = now();
        $user->save();
        return $user->with('role');
    }
}
