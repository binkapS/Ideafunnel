<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(string $category)
    {
        $category = Category::find($category);
        return \view('blog.category', [
            'articles' => $category->articles()->latest()->paginate(5)
        ]);
    }
}
