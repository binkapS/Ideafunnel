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
        $this->article = Article::with(['comments', 'cat', 'aut'])->find(\topic($article, false));
        return !\is_null($this->article);
    }

    public function fetch()
    {
        $this->update();
        return [
            'article' => $this->article,
            'commentCount' => \count($this->article->comments ?? []),
            'tags' => !\is_null($this->article->tags)
                && \str_contains($this->article->tags, ' ')
                ? \explode(' ', $this->article->tags)
                : []
        ];
    }
}
