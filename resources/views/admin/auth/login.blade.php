@extends('layouts.app')

@section('content')

<div class="flex justify-center items-center max-h-screen">
    <div class="max-w-lg p-5 w-full rounded-md mx-5 md:mx-0">
        <a href="{{ route('home') }}" class="flex justify-center items-center my-2">
            @include('components.app.logo-slogan')
        </a>

        <div class="w-full mt-5">
            <form action="{{ route('admin.login') }}" method="post">

                @csrf

                <div class="mb-2">
                <label class="sr-only" for="email">Email Address</label>
                <input class="auth-input @error('email')
                    border-2 border-red-500
                    @enderror" type="email" name="email" placeholder="Email address" value="{{ old('email') }}" autocomplete="email" required @error('email')
                        autofocus
                    @enderror>
                @error('email')
                    <span class="auth-error">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-2">
                <label class="sr-only" for="password">Password</label>
                <input class="auth-input @if(session('password'))
                    border-2 border-red-500
                    @endif" type="password" name="password" placeholder="Password" required autocomplete="password" @if(session('password'))

                    @endif>
                @if(session('password'))
                    <span class="auth-error">
                        <strong>{{ session('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="flex justify-between">
                <div>
                    <input type="checkbox" name="remember">
                    <label class="text-blue-400 text-sm" for="remember">{{ __('Remember me') }}</label>
                </div>
                <a class="text-blue-400 text-sm" href="">Forgot password?</a>
            </div>

            <div class="mt-3">
                <button class="auth-btn" type="submit" >Login <i class="fa fa-sign-in"></i></button>
            </div>
            </form>
        </div>

    </div>
</div>

@endsection
