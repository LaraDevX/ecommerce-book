<?php

namespace App\Interfaces\Services\v1;

interface CategoryServiceInterface
{
    public function allCategories($perPage);
    public function createCategory($data);
}
