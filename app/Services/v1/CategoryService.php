<?php

namespace App\Services\v1;

use App\Interfaces\Repositories\v1\CategoryRepositoryInterface;

class CategoryService
{
    public function __construct(protected CategoryRepositoryInterface $categoryRepository){

    }
    public function allCategories($perPage){
        $categories = $this->categoryRepository->allCategories();
        return $categories;
    }
    public function createCategory($data){
        $category = $this->categoryRepository->createCategory($data);
        return $category;
    }

    public function getCategory($id){
        $category = $this->categoryRepository->getCategory($id);
        return $category;
    }
    public function updateCategory($data, $id){
        $category = $this->categoryRepository->getCategory($id);
        $updatedCategory = $this->categoryRepository->updateCategory($category);
        return $updatedCategory;
    }
    public function deleteCategory($id){
        $category = $this->categoryRepository->getCategory($id);
        $this->categoryRepository->deleteCategory($category);
        return;
    }
}
