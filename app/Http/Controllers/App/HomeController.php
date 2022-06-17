<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Service\ArticleService;
use App\Service\NewsLetterService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, ArticleService $service)
    {
        return \view('app.home', $service->fetch());
    }

    public function create(Request $request, NewsLetterService $service)
    {
        $this->validate($request, [
            'email' => ['required', 'unique:news_letters,email']
        ], [
            'unique' => 'Email has already subscribed'
        ]);
        $service->create($request);
        return \back()->with('status');
    }
}
