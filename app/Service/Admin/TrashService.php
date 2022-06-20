<?php

namespace App\Service\Admin;

use App\Models\Article;
use App\Models\Draft;

class TrashService
{
    public function fetch()
    {
        return [
            'articles' => Article::onlyTrashed()->paginate(5, ["*"], 'articles'),
            'drafts' => Draft::onlyTrashed()->paginate(5, ['*'], 'drafts')
        ];
    }

    public function getDraft()
    {
    }

    public function getArticle()
    {
    }
}
