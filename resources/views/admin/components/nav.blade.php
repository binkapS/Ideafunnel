<div class="hidden w-full md:block md:w-auto" id="mobile-menu">
    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium uppercase">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-link">DashBoard</a>
        </li>
        <li>
            <a href="{{ route('article.create') }}" class="nav-link">New Article</a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="post">
                @csrf

                @method('DELETE')
                <button class="nav-link">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>
