<?php

namespace App\Interfaces\Services\v1;

interface CategoryServiceInterface
{
    public function allCategories($perPage);
    public function createCategory($data);
    public function getCategory($id);
    public function updateCategory($data, $id);
    public function deleteCategory($id);
}
