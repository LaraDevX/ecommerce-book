<?php

namespace App\Interfaces\Services;

use App\Traits\ResponseTrait;

interface UserServiceInterface
{
    public function registerUser($data);
    public function loginUser($data);
    public function verifyEmail($token);
}
