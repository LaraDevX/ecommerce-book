<?php
namespace App\Repositories\v1;

use App\Models\Category;

class CategoryRepository
{
    public function allCategories()
    {
        $categories = Category::with('books')->paginate(20);
        return $categories;
    }
    public function createCategory($data)
    {
        $category       = new Category();
        $category->name = $data['name'];
        $category->save();
        return $category;
    }
    public function getCategory($id)
    {
        $category = Category::with('books')->findOrFail($id);
        return $category;
    }
    public function updateCategory($data)
    {
        $category = new Category();
        $category->name = $data['name'];
        $category->save();
        return $category;
    }
    public function deleteCategory($category)
    {
        $category->delete();
        return;
    }
}
