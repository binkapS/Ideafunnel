@extends('layouts.admin')

@section('content')
    <div class="flex bg-white flex-col h-fit m-2">
        <div class="w-full p-2 bg-gray-500 flex-none h-fit rounded-t-md text-white">Articles</div>
        @if ($articles->count() > 0)
            <div class="flex flex-col space-y-3 my-2">
                @foreach ($articles as $article)
                    <div class="flex flex-col">
                        <a href="{{ route('article', $article->topic) }}"
                            class=" mx-1 bg-gray-100 py-1 border-l-4 pl-2 border-l-gray-400">
                            {{ $article->topic }}
                        </a>
                        <div class="flex text-xs text-gray-400 justify-start items-center my-1 mx-3 space-x-3">
                            <i class="fa fa-clock-o"> Created {{ $article->created_at->diffForHumans() }}</i>
                            <i class="fa fa-eye"> {{ $article->views }}</i>
                            <?php $commentCount = count($article->comments ?? []); ?>
                            <i class="fa fa-comments-o"> {{ $commentCount }}
                                {{ Str::plural('Comment', $commentCount) }}</i></span>
                        </div>
                        <div class="flex justify-between items-center text-sm mx-2">
                            <a href="{{ route('article.edit', $article) }}" class="text-blue-400 cursor-pointer">Edit</a>
                            <form action="{{ route('article.delete', $article) }}" method="post"
                                class="text-red-400 cursor-pointer">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    Move to trash
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center items-center py-2">
                {{ $articles->links() }}
            </div>
        @else
            <span class="h-full w-full flex justify-center items-center text-blue-400 font-semibold">
                No articles found
            </span>
        @endif
    </div>
@endsection
