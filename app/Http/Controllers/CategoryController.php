<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAllCategory()
    {
        $categories = $this->categoryService->getAllCategory();
        return view('category.index-category', compact('categories'));
    }

    public function createcategoryform()
    {
        return view('category.createcategory');
    }

    public function createcategory(CreateCategoryRequest $request)
    {
        $requestData = $request->validated();
        if ($request->hasFile('categories_image') && $request->file('categories_image')->isValid()) {
            $requestData['categories_image'] = $this->getImage($request->file('categories_image'));
        }
        $this->categoryService->createcategory($requestData);
        return redirect()->route('getAllCategory')->with('success', __('User created successfully.'));
    }

    private function getImage($file)
    {
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        return '/storage/' . $filePath;
    }

    public function editcategoryform($categoryId)
{
    $category = Category::findOrFail($categoryId);
    return view('category.editcategory', compact('category'));
}

public function editcategory(Request $request, $categoryId)
{
    $requestData = $request->validated();
    $category = Category::findOrFail($categoryId);

    if ($request->hasFile('categories_image') && $request->file('categories_image')->isValid()) {
        $requestData['categories_image'] = $this->getImage($request->file('categories_image'));
    }

    $category->update($requestData);

    return redirect()->route('getAllCategory')->with('success', __('Category updated successfully.'));
}

}
