<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return \view('blog.category', [
            'category' => $category,
            'articles' => $category->articles()->latest()->paginate(5)
        ]);
    }
}
