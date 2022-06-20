<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Admin\TrashService;
use Illuminate\Http\Request;

class ArticleTrashController extends Controller
{
    public function index(TrashService $service)
    {
        return \view('admin.trash-article', $service->getArticle());
    }
}
