<?php

namespace App\Service\Auth\Admin;

use App\Http\Requests\Auth\Admin\LoginRequest;

class LoginService
{
    public function login(LoginRequest $request)
    {
        return \auth()->attempt($request->only(['email', 'password']), isset($request->remember));
    }
}
