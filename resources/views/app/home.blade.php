@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 grid-rows-1 md:grid-rows-2 bg-white px-3 py-5 w-screen overflow-y-scroll mt-2 space-x-2 space-y-3">
    <div class="w-full bg-gray-700 rounded-sm max-h-fit">
        <div class="relative text-white bg-lime-500 px-2 py-0.5 uppercase -skew-x-12 rounded-sm -top-3.5 left-3 w-fit">
            Trending
        </div>
        <div class="p-2 space-y-1.5">

        </div>
    </div>
    <div class="w-full rounded-sm max-h-fit">
        <div class="w-full border-b -skew-x-12 mb-1">
            <span class="uppercase text-sm relative left-2 bg-lime-500 text-white px-2 py-0.5 rounded-sm">Latest</span>
        </div>
        <div class="p-1 space-y-1.5">
            @foreach ($latests as $latest)
                <a href="{{ route('article', topic($latest->topic, true)) }}" class="flex flex-row justify-start items-start space-x-2">
                    @if ($latest->hasImage())
                        <img height="100" width="100" src="{{ $latest->getImage() }}" alt="">
                    @else
                        <img height="100" width="100" src="{{ asset('images/logo_icon.png') }}" alt="">
                    @endif
                    <div class="flex flex-col">
                        <div class="flex space-x-2 text-xs text-gray-500">
                            <i class="fa fa-user"> {{ $latest->aut->username }}</i>
                            <i class="fa fa-clock-o"> {{ $latest->created_at->diffForHumans() }}</i>
                        </div>
                        <span class="text-sm text-blue-400">{{ $latest->topic }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="w-full rounded-sm max-h-fit">
        <div class="w-full border-b -skew-x-12 mb-1">
            <span class="uppercase text-sm relative left-2 bg-lime-500 text-white px-2 py-0.5 rounded-sm">Breaking news</span>
        </div>
        <div class="p-1 space-y-1.5">
            @foreach ($breakings as $breaking)
                <a href="{{ route('article', topic($breaking->topic, true)) }}" class="flex flex-row justify-start items-start space-x-2">
                    @if ($breaking->hasImage())
                        <img height="100" width="100" src="{{ $breaking->getImage() }}" alt="">
                    @else
                        <img height="100" width="100" src="{{ asset('images/logo_icon.png') }}" alt="">
                    @endif
                    <div class="flex flex-col">
                        <div class="flex space-x-2 text-xs text-gray-500">
                            <i class="fa fa-user"> {{ $breaking->aut->username }}</i>
                            <i class="fa fa-clock-o"> {{ $breaking->created_at->diffForHumans() }}</i>
                        </div>
                        <span class="text-sm text-blue-400">{{ $breaking->topic }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="w-full rounded-sm max-h-fit">
        <div class="w-full border-b -skew-x-12 mb-1">
            <span class="uppercase text-sm relative left-2 bg-lime-500 text-white px-2 py-0.5 rounded-sm">Update</span>
        </div>
        <div class="p-1 space-y-1.5">
            @foreach ($updates as $update)
                <a href="{{ route('article', topic($update->topic, true)) }}" class="flex flex-row justify-start items-start space-x-2">
                    @if ($update->hasImage())
                        <img height="100" width="100" src="{{ $update->getImage() }}" alt="">
                    @else
                        <img height="100" width="100" src="{{ asset('images/logo_icon.png') }}" alt="">
                    @endif
                    <div class="flex flex-col">
                        <div class="flex space-x-2 text-xs text-gray-500">
                            <i class="fa fa-user"> {{ $update->aut->username }}</i>
                            <i class="fa fa-clock-o"> {{ $update->created_at->diffForHumans() }}</i>
                        </div>
                        <span class="text-sm text-blue-400">{{ $update->topic }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
