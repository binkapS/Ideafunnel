<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

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
        <div class="h-full flex justify-center items-center my-60">
            <div
                class="space-x-1 bg-white px-3 py-5 text-2xl font-semibold rounded-md text-gray-600 border-2 border-gray-700">
                <span>@yield('code')</span>
                <span>|</span>
                <span>@yield('message')</span>
            </div>
        </div>
        @include('components.footer.app')
    </main>

</body>

</html>
