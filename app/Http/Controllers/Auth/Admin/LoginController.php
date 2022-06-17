<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\LoginRequest;
use App\Service\Auth\Admin\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return \view('admin.auth.login');
    }

    public function login(LoginRequest $request, LoginService $service)
    {
        if ($service->login($request)) {
            return \redirect()->route('admin.dashboard');
        }
        return \back()->with('password', 'Incorrect password');
    }
}
