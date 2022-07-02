<nav class="bg-gray-800 border-gray-500 px-2 py-2.5 fixed w-full top-0 z-50">
    <div class="flex flex-wrap justify-between items-center text-gray-300 hover:text-white">
        @auth()
            @if (auth()->user()->isAdmin())
                <img src="{{ auth()->user()->image ?? asset('images/logo_icon.png') }}"
                    alt="{{ auth()->user()->username }}'s profile image"
                    class="w-10 h-10 ring-2 rounded-full ring-gray-900 hover:ring-gray-200" id="profile-toggle">
            @else
                <a href="{{ route('home') }}" class="flex items-center justify-center">
                    @include('components.app.logo-name')
                </a>
            @endif
        @endauth
        @guest()
            <a href="{{ route('home') }}" class="flex items-center justify-center">
                @include('components.app.logo-name')
            </a>
        @endguest
        @include('components.nav.toggle')
        @include('components.nav.app')
    </div>
    @auth()
        @if (auth()->user()->isAdmin())
            @include('admin.components.profile-nav')
        @endif
    @endauth
</nav>
