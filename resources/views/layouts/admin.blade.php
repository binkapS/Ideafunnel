<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ auth()->user()->username }} | {{ config('app.name', 'Starsforex') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/logo_icon.png') }}" type="image/x-icon">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('scss/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/nav.js') }}" defer></script>

    <x-head.tinymce-config />
</head>

<body class="min-h-screen bg-gray-100 m-0 antialiased">

    @include('admin.components.header')

    <main class="origin-top top-16 relative z-auto h-full">
        @yield('content')
        @include('admin.components.footer')
    </main>

</body>

</html>
