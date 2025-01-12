<?php

namespace App\Interfaces\Services;


interface UserServiceInterface
{
    public function registerUser($data);
    public function loginUser($data);
    public function verifyEmail($token);
}
