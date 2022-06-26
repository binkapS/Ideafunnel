<?php

namespace App\Service\Admin;

use App\Models\Article;
use App\Models\Draft;

class TrashService
{
    private Article|null $article;


    private Draft|null $draft;

    public function fetch()
    {
        return [
            'articles' => Article::onlyTrashed()->paginate(5, ["*"], 'articles'),
            'drafts' => Draft::onlyTrashed()->paginate(5, ['*'], 'drafts')
        ];
    }

    public function getDraft()
    {
        return ['draft' => $this->draft];
    }

    public function getArticle()
    {
        return ['article' => $this->article];
    }

    public function restoreArticle()
    {
        return $this->article->restore();
    }

    public function restoreDraft()
    {
        return $this->draft->restore();
    }

    public function deleteArticle()
    {
        return $this->article->forceDelete();
    }

    public function deleteDraft()
    {
        return $this->draft->forceDelete();
    }

    public function articleFound(string $article): bool
    {
        return !\is_null($this->article = Article::onlyTrashed()->find(\topic($article, \false)));
    }

    public function draftFound(string $draft): bool
    {
        return !\is_null($this->draft = Draft::onlyTrashed()->find($draft));
    }
}
