<?php

namespace App\Http\Controllers\Admin;

use App\Binkap\Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Service\Admin\TrashService;
use Illuminate\Http\Request;

class CategoryTrashController extends Controller
{
    public function index(TrashService $service, string $category)
    {
        if ($service->categoryFound($category)) {
            return \view('admin.trash-category', $service->getCategory());
        }
        return Response::deny('Not found', 404)->view();
    }

    public function restore(TrashService $service, string $category)
    {
        if ($service->categoryFound($category)) {
            $service->restoreCategory();
            return \back()->with('status');
        }
        return Response::deny('Not found', 404)->view();
    }

    public function delete(TrashService $service, string $category)
    {
        if ($service->categoryFound($category)) {
            $service->deleteCategory();
            return \back()->with('status');
        }
        return Response::deny('Not found', 404)->view();
    }
}
