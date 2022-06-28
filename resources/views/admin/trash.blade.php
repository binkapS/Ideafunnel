@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 h-screen m-2 md:space-x-3 space-y-3">
        <div class="flex bg-white flex-col h-fit">
            <div class="w-full p-2 bg-gray-500 flex-none h-fit rounded-t-md text-white">Trashed Articles</div>
            @if ($articles->count() > 0)
                <div class="flex flex-col space-y-3 my-2">
                    @foreach ($articles as $article)
                        <div class="flex flex-col">
                            <a href="{{ route('trash.article', $article->topic) }}"
                                class=" mx-1 bg-gray-100 py-1 border-l-4 pl-2 border-l-gray-400">
                                {{ $article->topic }}
                            </a>
                            <div class="flex text-xs text-gray-400 justify-between items-center my-1 mx-3">
                                <i class="fa fa-clock-o"> Created {{ $article->created_at->diffForHumans() }}</i>
                                <i class="fa fa-clock-o"> Deleted {{ $article->deleted_at->diffForHumans() }}</i>
                            </div>
                            <div class="flex justify-between items-center text-sm mx-2">
                                <form action="{{ route('trash.article', $article->topic) }}" method="post"
                                    class="text-blue-400 cursor-pointer">
                                    @csrf

                                    <button type="submit">
                                        Restore
                                    </button>
                                </form>
                                <form action="{{ route('trash.article', $article->topic) }}" method="post"
                                    class="text-red-400 cursor-pointer">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        Delete permanently
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
                    No trashed articles found
                </span>
            @endif
        </div>
        <div class="flex bg-white flex-col h-fit">
            <span class="w-full p-2 bg-gray-500 flex-none h-fit rounded-t-md text-white">Trashed Drafts</span>
            @if ($drafts->count() > 0)
                <div class="flex flex-col space-y-3 my-2">
                    @foreach ($drafts as $draft)
                        <div class="flex flex-col">
                            <a href="{{ route('trash.draft', $draft) }}"
                                class=" mx-1 bg-gray-100 py-1 border-l-4 pl-2 border-l-gray-400">
                                {{ $draft->topic }}
                            </a>
                            <div class="flex text-xs text-gray-400 justify-between items- my-1 mx-3">
                                <i class="fa fa-clock-o"> Created {{ $draft->created_at->diffForHumans() }}</i>
                                <i class="fa fa-clock-o"> Deleted {{ $draft->deleted_at->diffForHumans() }}</i>
                            </div>
                            <div class="flex justify-between items-center text-sm mx-2">
                                <form action="{{ route('trash.draft', $draft->id) }}" method="post"
                                    class="text-blue-400 cursor-pointer">
                                    @csrf

                                    <button type="submit">
                                        Restore
                                    </button>
                                </form>
                                <form action="{{ route('trash.draft', $draft->id) }}" method="post"
                                    class="text-red-400 cursor-pointer">
                                    @csrf

                                    @method('DELETE')
                                    <button type="submit">
                                        Delete permanently
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center items-center py-2">
                    {{ $drafts->links() }}
                </div>
            @else
                <span class="h-full w-full flex justify-center items-center text-blue-400 font-semibold">
                    No trashed drafts found
                </span>
            @endif
        </div>
        <div class="flex bg-white flex-col h-fit">
            <div class="w-full p-2 bg-gray-500 flex-none h-fit rounded-t-md text-white">Trashed Categories</div>
            @if ($categories->count() > 0)
                <div class="flex flex-col space-y-3 my-2">
                    @foreach ($categories as $category)
                        <div class="flex flex-col">
                            <a href="{{ route('trash.category', $category->id) }}"
                                class=" mx-1 bg-gray-100 py-1 border-l-4 pl-2 border-l-gray-400">
                                {{ $category->name }}
                            </a>
                            <div class="flex text-xs text-gray-400 justify-between items-center my-1 mx-3">
                                <i class="fa fa-clock-o"> Created {{ $category->created_at->diffForHumans() }}</i>
                                <i class="fa fa-clock-o"> Deleted {{ $category->deleted_at->diffForHumans() }}</i>
                            </div>
                            <div class="flex justify-between items-center text-sm mx-2">
                                <form action="{{ route('trash.category', $category->id) }}" method="post"
                                    class="text-blue-400 cursor-pointer">
                                    @csrf

                                    <button type="submit">
                                        Restore
                                    </button>
                                </form>
                                <form action="{{ route('trash.category', $category->id) }}" method="post"
                                    class="text-red-400 cursor-pointer">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        Delete permanently
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center items-center py-2">
                    {{ $categories->links() }}
                </div>
            @else
                <span class="h-full w-full flex justify-center items-center text-blue-400 font-semibold">
                    No trashed articles found
                </span>
            @endif
        </div>
    </div>
@endsection
