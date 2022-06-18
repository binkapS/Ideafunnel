<footer class="bg-gray-800 px-5 text-gray-300 hover:text-white py-1">
    <div class="flex justify-center flex-col items-center text-sm">
       <span class="uppercase"> &copy; <a href="{{ route('home') }}" class="text-lime-400">{{ config('app.name') }}</a> {{ (date('Y') == 2022) ? date('Y') : "2022 - ". date('Y') }}</span>
       <span class="text-xs">Designed and Developed by  <a class="text-lime-400" href="mailto:real.desert.tiger@gmail.com">Binkap S</a></span>
    </div>
</footer>
