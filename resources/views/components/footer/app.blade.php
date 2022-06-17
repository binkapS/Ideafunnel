<footer class="bg-gray-800 px-5 text-gray-300 hover:text-white divide-y-2 divide-gray-300">
    <div class="flex text-sm py-3 justify-center items-center">
    <form action="{{ route('home') }}" method="post">
        @csrf
        <div class="flex items-center space-x-2">
            <i class="fa fa-envelope-o text-lg"></i>
            <span>Subscribe to newsletter</span>
        </div>
        <div class="flex">
            <label class="sr-only" for="email">Newsletter</label>
            <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Your email address"
            class="p-2 rounded-l-md text-gray-900"
            required
            autocomplete="email"
            >
            <button
            type="submit"
            class="uppercase bg-lime-400 p-2 text-white rounded-r-md outline-none"
            @error('email')
                autofucus
            @enderror
            >
            Subscribe
            </button>
        </div>
        @error('email')
            <div class="text-xs text-red-500">
                {{ $message }}
            </div>
        @enderror
    </form>
    </div>
    <div class="flex flex-col text-sm py-3 space-y-2">
        @foreach (categories(10) as $category)
            <a href="{{ route('category', $category) }}" class="space-y-1 text-gray-300 hover:text-lime-500">
                <div class="flex items-center space-x-2">
                    <i class="fa fa-dot-circle-o"></i>
                    <span>{{ ucfirst($category->name) }}</span>
                </div>
            </a>
        @endforeach
    </div>
    <div class="flex flex-col text-sm py-3 space-y-2">
        <a href="https://facebook.com" target="_blank" class="space-x-1 text-gray-300 hover:text-lime-500">
            <i class="fa fa-facebook-square"></i>
           <span>Facebook</span>
        </a>
        <a href="https://facebook.com" target="_blank" class="space-x-1 text-gray-300 hover:text-lime-500">
            <i class="fa fa-instagram"></i>
           <span>Instagram</span>
        </a>
        <a href="https://facebook.com" target="_blank" class="space-x-1 text-gray-300 hover:text-lime-500">
            <i class="fa fa-twitter-square"></i>
           <span>Twitter</span>
        </a>
        <a href="https://facebook.com" target="_blank" class="space-x-1 text-gray-300 hover:text-lime-500">
            <i class="fa fa-telegram"></i>
           <span>Telegram</span>
        </a>
        <a href="https://facebook.com" target="_blank" class="space-x-1 text-gray-300 hover:text-lime-500">
            <i class="fa fa-youtube-play"></i>
           <span>Youtube</span>
        </a>
    </div>
    <div class="flex justify-center flex-col items-center text-sm py-3">
       <span class="uppercase"> &copy; <a href="{{ route('home') }}" class="text-lime-400">{{ config('app.name') }}</a> {{ (date('Y') == 2022) ? date('Y') : "2022 - ". date('Y') }}</span>
       <span class="text-xs">Designed and Developed by  <a class="text-lime-400" href="mailto:real.desert.tiger@gmail.com">Binkap S</a></span>
    </div>
</footer>
