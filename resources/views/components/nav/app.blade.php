<div class="hidden w-full md:block md:w-auto" id="mobile-menu">
    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
        @auth
            @if (auth()->user()->isAdmin())
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                </li>
            @endif
        @endauth
        <li>
            <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
        <li>
            <a href="{{ route('about') }}" class="nav-link">About Us</a>
        </li>
        <li>
            <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
        </li>
        @auth()
        <li>
            <form action="{{ route('logout') }}" method="post">
                @csrf

                @method('DELETE')
                <button class="nav-link">
                    Logout
                </button>
            </form>
        </li>
        @endauth
    </ul>
</div>
