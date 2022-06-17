<?php

namespace App\Http\Controllers\Blog;

use App\Binkap\Response;
use App\Http\Controllers\Controller;
use App\Service\ArticleCountService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(string $article, ArticleCountService $service)
    {
        if ($service->validate($article)) {
            return \view('blog.article', [
                'article' => $service->getArticle(),
                'commentCount' => \count($service->getArticle()->comments ?? []),
                'tags' => !\is_null($service->getArticle()->tags)
                    && \str_contains($service->getArticle()->tags, ' ')
                    ? \explode(' ', $service->getArticle()->tags)
                    : []
            ]);
        }
        return Response::deny('Article not found', 404)->view();
    }
}
