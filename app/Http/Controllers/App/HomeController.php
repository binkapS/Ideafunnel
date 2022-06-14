<?php

namespace App\Http\Controllers\App;

use App\Binkap\Constant;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return \view('app.home', [
            'trends' => Article::where('views', '>', 50)->orderBy('views', 'desc')->limit(4)->get(),
            'latests' => Article::latest()->limit(5)->get(),
            'breakings' => Article::where('type', '=', Constant::ARTICLE_TYPE_BREAKING)->latest()->limit(5)->get(),
            'updates' => Article::where('type', '=', Constant::ARTICLE_TYPE_UPDATE)->latest()->limit(5)->get()
        ]);
    }

    public function create(Request $request)
    {
        \dd($request);
    }
}
