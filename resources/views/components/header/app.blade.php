<nav class="bg-gray-800 border-gray-500 px-2 py-2.5 fixed w-full top-0 z-50">
    <div class="flex flex-wrap justify-between items-center text-gray-300 hover:text-white">
        <a href="{{ route('home') }}" class="flex items-center justify-center">
            @include('components.app.logo-name')
        </a>
        @include('components.nav.toggle')
        @include('components.nav.app')
    </div>
</nav>
