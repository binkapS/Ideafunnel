<?php

namespace App\Service;

use App\Binkap\Constant;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Str;

class CommentService
{
    private Article $article;

    private Comment $comment;

    public function create(CreateCommentRequest $request, Article $article)
    {
        $this->article = $article;
        \auth()->guest() ? $this->guestCreate($request) : $this->authCreate($request);
    }

    private function authCreate(CreateCommentRequest $request)
    {
        $user = $request->user();
        $this->article->comments()->create([
            'id' => $this->generateId(),
            'author' => $user->name,
            'email' => $user->email,
            'body' => $request->comment
        ]);
    }

    private function guestCreate(CreateCommentRequest $request)
    {
        $this->article->comments()->create([
            'id' => $this->generateId(),
            'author' => $request->name,
            'email' => $request->email,
            'body' => $request->comment
        ]);
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
    }

    public function reply()
    {
    }

    private function generateId(): string
    {
        return Str::random(Constant::COMMENT_ID_LENGTH);
    }
}
