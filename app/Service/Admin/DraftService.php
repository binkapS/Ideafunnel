<?php

namespace App\Service\Admin;

use App\Binkap\Constant;
use App\Models\Article;
use App\Models\Draft;
use App\Models\User;
use Illuminate\Http\Request;

class DraftService
{
    public function fetch(Request $request)
    {
        if ($request->user()->isAdmin()) {
            return [
                'drafts' => Draft::paginate(10)
            ];
        }
        return [
            'drafts' => $request->user()->drafts()->paginate(10)
        ];
    }

    public function publish(Draft $draft, Request $request)
    {
        $article = Article::create([
            'id' => $draft->id,
            'topic' => $draft->topic,
            'author' => $draft->author,
            'body' => $draft->body,
            'image' => $draft->image,
            'category' => $draft->category,
            'type' => $draft->type,
            'tags' => $draft->tags,
            'status' => $this->getStatus($request->user())
        ]);
        if ($draft->delete()) {
            $draft->forceDelete();
        }
        return $article;
    }

    private function getStatus(User $user)
    {
        return $user->isAdmin()
            ? Constant::ARTICLE_STATUS_APPROVED
            : Constant::ARTICLE_STATUS_PENDING;
    }

    public function trash(Draft $draft)
    {
        return $draft->delete();
    }

    public function delete(Draft $draft)
    {
        return $draft->forceDelete();
    }
}
