<?php

namespace App\Service;

use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterService
{
    public function create(Request $request)
    {
        NewsLetter::create($request->only('email'));
    }
}
