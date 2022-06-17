<?php

namespace App\Service;

use App\Binkap\Constant;
use App\Models\Article;

class ArticleService
{
    public function fetch()
    {
        return [
            'trends' => Article::with('aut')
                ->where('status', '=', Constant::ARTICLE_STATUS_APPROVED)
                ->where('views', '>', 50)->orderBy('views', 'desc')
                ->limit(4)
                ->get(),
            'latests' => Article::with('aut')
                ->where('status', '=', Constant::ARTICLE_STATUS_APPROVED)
                ->latest()
                ->limit(5)
                ->get(),
            'breakings' => Article::with('aut')
                ->where('status', '=', Constant::ARTICLE_STATUS_APPROVED)
                ->where('type', '=', Constant::ARTICLE_TYPE_BREAKING)
                ->latest()
                ->limit(5)
                ->get(),
            'updates' => Article::with('aut')
                ->where('status', '=', Constant::ARTICLE_STATUS_APPROVED)
                ->where('type', '=', Constant::ARTICLE_TYPE_UPDATE)
                ->latest()
                ->limit(5)
                ->get()
        ];
    }
}
