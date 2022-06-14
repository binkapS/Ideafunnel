<?php

namespace App\Service;

use App\Models\Article;

class ArticleCountService
{
    private Article|null $article;

    private function update()
    {
        $this->article->update([
            'views' => (int) $this->article->views + 1
        ]);
    }

    public function validate(string $article): bool
    {
        $this->article = Article::with(['comments', 'cat'])->find(\topic($article, false));
        return !\is_null($this->article);
    }

    public function getArticle()
    {
        $this->update();
        return $this->article;
    }
}
