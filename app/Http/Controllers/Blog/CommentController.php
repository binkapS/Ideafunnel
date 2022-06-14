<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\ReplyCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Service\CommentService;

class CommentController extends Controller
{
    public function create(CreateCommentRequest $request, Article $article, CommentService $service)
    {
        $service->create();
        return \back()->with('status');
    }

    public function update(UpdateCommentRequest $request, Comment $comment, CommentService $service)
    {
        $service->update();
        return \back()->with('status');
    }

    public function reply(ReplyCommentRequest $request, Comment $comment, CommentService $service)
    {
        $service->reply();
        return \back()->with('status');
    }
}
