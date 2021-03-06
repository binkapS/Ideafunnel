<?php

namespace App\Service\Admin;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleService
{
    public function fetch(Request $request)
    {
        if ($request->user()->isAdmin()) {
            return [
                'articles' => Article::with(['comments'])
                    ->latest()
                    ->paginate(5)
            ];
        }
        return [
            'articles' => $request->user()
                ->articles()
                ->with(['comments'])
                ->latest()
                ->paginate(5)
        ];
    }

    public function trash(Article $article)
    {
        return $article->delete();
    }

    public function delete(Article $article)
    {
        return $article->forceDelete();
    }
}
