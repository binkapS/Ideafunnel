<div id="profile-menu" class="absolute z-40 mt-1 w-44 rounded-md p-2 bg-gray-700 hidden ml-1">
    <ul class="text-center">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
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
