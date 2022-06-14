<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ auth()->user() }} | {{ config('app.name', 'Starsforex') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('scss/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="min-h-screen bg-gray-100 m-0 antialiased">

    <main class="origin-top top-16 relative z-auto h-full">
        @yield('content')
    </main>

</body>

</html>
