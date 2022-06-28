<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Http\Requests\Admin\EditCategoryRequest;
use App\Models\Category;
use App\Service\Admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, CategoryService $service)
    {
        return \view('admin.categories', $service->fetch($request));
    }

    public function show(Category $category)
    {
        \dd($category);
    }

    public function create(CreateCategoryRequest $request, CategoryService $service)
    {
        $service->create($request);
        return \back()->with('status');
    }

    public function update(EditCategoryRequest $request)
    {
    }

    public function delete(Category $category, CategoryService $service)
    {
        $service->delete($category);
        return \back()->with('status');
    }
}
