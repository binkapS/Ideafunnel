<?php

namespace App\Http\Controllers\Admin;

use App\Binkap\Response;
use App\Http\Controllers\Controller;
use App\Service\Admin\TrashService;
use Illuminate\Http\Request;

class ArticleTrashController extends Controller
{
    public function index(TrashService $service, string $article)
    {
        if ($service->articleFound($article)) {
            return \view('admin.trash-article', $service->getArticle());
        }
        return Response::deny('Not found', 404)->view();
    }

    public function restore(TrashService $service, string $article)
    {
        if ($service->articleFound($article)) {
            $service->restoreArticle();
            return \back()->with('status');
        }
        return Response::deny('Not found', 404)->view();
    }

    public function delete(TrashService $service, string $article)
    {
        if ($service->articleFound($article)) {
            $service->deleteArticle();
            return \back()->with('status');
        }
        return Response::deny('Not found', 404)->view();
    }
}
