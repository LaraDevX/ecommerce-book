<?php

namespace App\Http\Controllers\v1;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Category\StoreCategoryRequest;
use App\Http\Resources\v1\CategoryResource;
use App\Http\Requests\v1\Category\UpdateCategoryRequest;
use App\Interfaces\Services\v1\CategoryServiceInterface;

class CategoryController extends Controller
{
    public function __construct(protected CategoryServiceInterface $categoryService){

    }
    public function index()
    {
        $categories = $this->categoryService->allCategories(10);
        return $this->responsePagination($categories, CategoryResource::collection($categories));
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryService->createCategory($request->all());
        return $this->success($category, __('successes.category.created'), 201);

    }

    public function show(string $id)
    {
        $category = $this->categoryService->getCategory($id);
        return $this->success(new CategoryResource($category));
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = $this->categoryService->updateCategory($request->all(), $id);
        return $this->success($category, __('successes.category.updated'));
    }

    public function destroy(string $id)
    {
        $this->categoryService->deleteCategory($id);
        return $this->success([], __('successes.category.deleted'));
    }
}
