<?php

namespace App\Interfaces\Repositories\v1;

interface CategoryRepositoryInterface
{
    public function allCategories();
    public function getCategory($id);
    public function updateCategory($data);
    public function createCategory($data);
    public function deleteCategory($category);
}
