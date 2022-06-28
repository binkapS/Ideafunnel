<?php

namespace App\Service\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Draft;

class TrashService
{
    private Article|null $article;

    private Draft|null $draft;

    private Category|null $category;

    public function fetch()
    {
        return [
            'articles' => Article::onlyTrashed()->paginate(6, ["*"], 'articles'),
            'drafts' => Draft::onlyTrashed()->paginate(6, ['*'], 'drafts'),
            'categories' => Category::onlyTrashed()->paginate(6, ['*'], 'categories')
        ];
    }

    public function getDraft(): array
    {
        return ['draft' => $this->draft];
    }

    public function getArticle(): array
    {
        return ['article' => $this->article];
    }

    public function getCategory(): array
    {
        return ['category' => $this->category];
    }

    public function restoreArticle()
    {
        return $this->article->restore();
    }

    public function restoreDraft()
    {
        return $this->draft->restore();
    }

    public function restoreCategory()
    {
        return $this->category->restore();
    }

    public function deleteArticle()
    {
        return $this->article->forceDelete();
    }

    public function deleteDraft()
    {
        return $this->draft->forceDelete();
    }

    public function deleteCategory()
    {
        return $this->category->forceDelete();
    }

    public function articleFound(string $article): bool
    {
        return !\is_null($this->article = Article::onlyTrashed()->find(\topic($article, \false)));
    }

    public function draftFound(string $draft): bool
    {
        return !\is_null($this->draft = Draft::onlyTrashed()->find($draft));
    }

    public function categoryFound(string $category): bool
    {
        return !\is_null($this->category = Category::onlyTrashed()->find($category));
    }
}
