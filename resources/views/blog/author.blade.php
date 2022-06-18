@extends('layouts.app')

@section('content')
    <div class="flex bg-white mx-2 my-4 p-3">
        <div class="flex w-full flex-col justify-center items-center">
            @if ($author->hasProfileImage())
                <img class="rounded-2xl" width="250" height="250" src="{{ $author->getProfileImage() }}" alt="{{ $author->username }}'s picture">
            @endif
            <div class="flex flex-col my-2 justify-center items-center text-lg font-medium text-gray-600">
                <span>{{ $author->username }}</span>
                <span class="uppercase">{{ $author->name }}</span>
            </div>
            <p class="text-gray-600 flex items-start justify-start w-full">
               {!! "About Author" !!}
            </p>
        </div>
    </div>
@endsection
