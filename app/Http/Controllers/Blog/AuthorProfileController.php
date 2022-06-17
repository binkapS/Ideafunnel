<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorProfileController extends Controller
{
    public function index(User $author)
    {
        return \view('blog.author', [
            'author' => $author
        ]);
    }
}
