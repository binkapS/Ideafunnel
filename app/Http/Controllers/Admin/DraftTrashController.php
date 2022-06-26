<?php

namespace App\Http\Controllers\Admin;

use App\Binkap\Response;
use App\Http\Controllers\Controller;
use App\Service\Admin\TrashService;
use Illuminate\Http\Request;

class DraftTrashController extends Controller
{
    public function index(TrashService $service, string $draft)
    {
        if ($service->draftFound($draft)) {
            return \view('admin.trash-draft', $service->getDraft());
        }
        return Response::deny('Not found', 404)->view();
    }

    public function restore(TrashService $service, string $draft)
    {
        if ($service->draftFound($draft)) {
            $service->restoreDraft();
            return \back()->with('status');
        }
        return Response::deny('Not found', 404)->view();
    }

    public function delete(TrashService $service, string $draft)
    {
        if ($service->draftFound($draft)) {
            $service->deleteDraft();
            return \back()->with('status');
        }
        return Response::deny('Not found', 404)->view();
    }
}
