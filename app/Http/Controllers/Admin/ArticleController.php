<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Service\Admin\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request, ArticleService $service)
    {
        return \view('admin.articles', $service->fetch($request));
    }

    public function show(Article $article)
    {
        return \view('admin.article-edit', ['article' => $article]);
    }

    public function delete(Article $article, ArticleService $service)
    {
        $service->trash($article);
        return \back()->with('status');
    }
}
