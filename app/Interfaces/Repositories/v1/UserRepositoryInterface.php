<?php

namespace App\Interfaces\Repositories\v1;

interface UserRepositoryInterface
{
    public function createUser($data);
    public function getUserByEmail($email);
    public function findUserByToken($token);
}
