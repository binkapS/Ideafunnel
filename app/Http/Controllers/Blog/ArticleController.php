<?php

namespace App\Http\Controllers\Blog;

use App\Binkap\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateArticleRequest;
use App\Http\Requests\Admin\DeleteArticleRequest;
use App\Http\Requests\Admin\EditArticleRequest;
use App\Models\Article;
use App\Service\Admin\CreateArticleService;
use App\Service\ArticleCountService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(string $article, ArticleCountService $service)
    {
        if ($service->validate($article)) {
            return \view('blog.article', $service->fetch());
        }
        return Response::deny('Article not found', 404)->view();
    }

    public function showCreate()
    {
        return \view('admin.article-create');
    }

    public function showEdit(Article $article)
    {
        return \view('admin.article-edit', ['article' => $article]);
    }

    public function create(CreateArticleRequest $request, CreateArticleService $service)
    {
        $service->handle($request);
    }

    public function update(EditArticleRequest $request)
    {
    }

    public function delete(DeleteArticleRequest $request)
    {
    }
}
