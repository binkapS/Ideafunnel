<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('scss/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/nav.js') }}" defer></script>
</head>

<body class="min-h-screen bg-gray-100 m-0 antialiased">

    @include('components.header.app')

    <main class="origin-top z-0 relative h-full top-14">
        @yield('content')

        @include('components.footer.app')
    </main>

</body>

</html>
