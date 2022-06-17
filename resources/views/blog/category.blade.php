@extends('layouts.app')

@section('content')
    <div class="flex bg-white w-screen p-3 flex-col">
        <span class="">{{ $category->name }}</span>
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="flex flex-col space-y-3">
                @foreach ($articles as $article)
                    <a href="{{ route('article', topic($article->topic, true)) }}" class="flex flex-col">
                        @if ($article->hasThumbnail())
                            <img src="{{ $article->getThumbnail() }}" alt="{{ $article->topic }}'s image">
                        @else
                            <img src="{{ asset('images/test.jpg') }}" alt="">
                        @endif
                        <?php $count = count($article->comments ?? []) ?>
                        <div class="flex space-x-2 justify-center items-center text-gray-500 text-sm">
                            <i class="fa fa-user-o"> {{$article->author }}</i>
                            <i class="fa fa-comments-o"> {{ $count }} {{ Str::plural("Comment", $count) }}</i>
                            <i class="fa fa-clock-o">  {{ $article->created_at->diffForHumans() }}</i>
                        </div>
                        <span class="text-blue-400 text-sm">{{ $article->topic }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
