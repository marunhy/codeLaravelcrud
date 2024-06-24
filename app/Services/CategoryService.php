<?php

namespace App\Services;

use App\Models\Category;



class CategoryService
{
    public function getAllCategory()
    {
        $categories = Category::latest()->get();
        return $categories;
    }

    public function createcategory(array $data)
    {
        return Category::create([
            'name' => $data['name'],
            'categories_image' => $data['categories_image'] ?? null,
        ]);

    }
}
