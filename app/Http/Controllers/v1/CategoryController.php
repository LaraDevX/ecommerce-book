<?php

namespace App\Http\Controllers\v1;

use App\Interfaces\Services\v1\CategoryServiceInterface;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function __construct(protected CategoryServiceInterface $categoryService){

    }
    public function index()
    {
        $categories = $this->categoryService->allCategories(10);
        return $this->responsePagination($categories, CategoryResource::collection($categories));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryService->createCategory($request->all());
        return $this->success($category, __('successes.category.created'), 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
