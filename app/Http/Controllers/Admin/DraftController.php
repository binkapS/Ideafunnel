<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Draft;
use App\Service\Admin\DraftService;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    public function index(Request $request, DraftService $service)
    {
        return \view('admin.drafts', $service->fetch($request));
    }

    public function show(Draft $draft)
    {
        return \view('admin.draft-edit', ['draft' => $draft]);
    }

    public function publish(Request $request, Draft $draft, DraftService $service)
    {
        $service->publish($draft, $request);
        return \back()->with('status');
    }

    public function delete(Draft $draft, DraftService $service)
    {
        $service->trash($draft);
        return \back()->with('status');
    }
}
