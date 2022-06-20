<div class="hidden w-full md:block md:w-auto" id="mobile-menu">
    <ul class="flex flex-col mt-4 md:flex-row md:space-x-5 md:mt-0 md:text-sm md:font-medium">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('article.create') }}" class="nav-link">New Article</a>
        </li>
        <li>
            <a href="{{ route('admin.articles') }}" class="nav-link">Articles</a>
        </li>
        <li>
            <a href="{{ route('admin.drafts') }}" class="nav-link">Drafts</a>
        </li>
        <li>
            <a href="{{ route('trash') }}" class="nav-link">Trash</a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="post" class="w-full">
                @csrf

                @method('DELETE')
                <button class="nav-link">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>
