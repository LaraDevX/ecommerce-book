<?php

namespace App\Interfaces\Services\v1;


interface UserServiceInterface
{
    public function registerUser($data);
    public function loginUser($data);
    public function verifyEmail($token);
}
