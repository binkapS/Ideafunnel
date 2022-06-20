@extends('layouts.admin')

@section('content')
<div class="bg-white p-3 m-2 overflow-y-scroll h-screen">
    @forelse ($articles as $article)
    <div class="flex flex-col">
        <span class="attention my-2">{{ $article->topic }}</span>
        <div class="flex justify-between w-full items-center">
            <a href="{{ route('article.edit', $article) }}" class="btn-primary">Edit</a>
            <a href="{{ route('article', topic($article->topic, true)) }}" class="btn-primary">View</a>
            <form action="{{ route('article.delete', $article) }}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn-primary bg-red-600 hover:bg-red-700">Delete</button>
            </form>
        </div>
    </div>
    @empty
        <span class="w-full flex justify-center items-center h-full text-lg font-semibold text-blue-400">
            Not article found
        </span>
    @endforelse
</div>
@endsection
