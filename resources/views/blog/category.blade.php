@extends('layouts.app')

@section('content')
    <div class="flex bg-white w-screen p-3 flex-col">
        <div class="w-full -skew-x-12 mb-1">
            <span class="uppercase text-sm relative left-2 bg-lime-500 text-white px-2 py-0.5 rounded-sm">{{ $category->name }}</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 md:grid-rows-2">
                @foreach ($articles as $article)
                    <a href="{{ route('article', topic($article->topic, true)) }}" class="flex flex-col">
                        <div class="flex justify-center">
                             @if ($article->hasImage())
                                <img width="" src="{{ $article->getImage() }}" alt="{{ $article->topic }}'s image">
                            @else
                                <img width="300" height="300" src="{{ asset('images/test.jpg') }}" alt="">
                            @endif
                        </div>
                        <?php $count = count($article->comments ?? []) ?>
                        <div class="flex space-x-2 justify-center items-center text-gray-500 text-sm uppercase my-2 font-sans font-normal">
                            <i class="fa fa-user-o"> {{$article->aut->username }}</i>
                            <i class="fa fa-comments-o"> {{ $count }} {{ Str::plural("Comment", $count) }}</i>
                            <i class="fa fa-clock-o">  {{ $article->created_at->diffForHumans() }}</i>
                        </div>
                        <span class="text-blue-400 text-sm text-center">{{ $article->topic }}</span>
                    </a>
                @endforeach
        </div>
    </div>
@endsection
