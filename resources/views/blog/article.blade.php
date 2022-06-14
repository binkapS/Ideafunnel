@extends('layouts.app')

@section('content')
   <div class="flex flex-col justify-center items-center bg-white mx-2 my-4 rounded-md p-3">
        <div class="text-xl font-bold text-center">
            {{  $article->topic }}
        </div>
        <div class="flex flex-row text-blue-400 justify-start space-x-3 my-2 items-center">
            <a href="{{ route('category', $article->category) }}"><i class="fa fa-th-list"> {{ $article->cat->name }}</i></a>
            <i class="fa fa-comments-o"> {{ $commentCount }} {{ Str::plural("Comment", $commentCount) }}</i>
        </div>
        @if ($article->hasImage())
            <img class="rounded-md" src="{{ $article->getImage() }}" alt="{{ $article->topic }}">
        @endif
        <p class="text-gray-700">
            {!! $article->body !!}
        </p>
        @if (count($tags) > 0)
            <div class="flex justify-start items-center w-full mt-3 space-x-2">
            <i class="fa fa-tag text-gray-500"></i>
            @foreach ($tags as $tag)
                <a href="{{ route('tag', $tag) }}" class="bg-lime-500 py-0.5 px-1 text-white rounded-md -skew-x-6 text-xs text-center">
                    {{ $tag }}
                </a>
            @endforeach
            </div>
        @endif
        @if ($commentCount > 0)
            <div class="flex justify-start w-full flex-col mt-5">
                <span class="text-xl font-semibold text-gray-600 mb-3">Comments</span>
                <div class="flex flex-col space-y-2">
                    @foreach ($article->comments as $comment)
                    <div class="flex flex-col space-y-1">
                        <i class="fa fa-user-o text-gray-500">  {{ $comment->author }}</i>
                        <span class="text-sm">
                            {!! $comment->body !!}
                        </span>
                       @auth
                            <div class="flex flex-col max-w-sm space-y-2">

                            <div class="flex justify-start space-x-5">
                                <button type="button" id="edit-comment" class="text-xs text-blue-500 cursor-pointer">edit</button>
                                <button type="button" id="reply-comment" class="text-xs text-blue-500 cursor-pointer">reply</button>
                            </div>

                            <form action="{{ route('comment.update', $comment) }}" method="post" id="comment-edit" class="hidden">
                                @csrf

                                @method('PUT')

                                <label for="edit" class="sr-only">Edit comment</label>
                                <textarea
                                name="edit"
                                placeholder=" Type comment here..."
                                class="w-full ring-1 ring-lime-500 rounded-md text-gray-800 p-2 text-sm"
                                rows="2"
                                required
                                >{{ $comment->body }}</textarea>
                                @error('edit')
                                    <div class="text-red-500 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="flex w-full justify-end">
                                    <button
                                    type="submit"
                                    class="w-fit bg-lime-400 px-2 p-0.5 rounded-md text-sm text-white"
                                    >
                                    Edit
                                    </button>
                                </div>
                            </form>

                            <form action="{{ route('comment.reply', $comment) }}" method="post" id="comment-reply" class="hidden">
                                @csrf

                                @method('DELETE')

                                <label for="reply" class="sr-only">Reply</label>
                                <textarea
                                name="reply"
                                placeholder="Type reply here..."
                                class="w-full ring-1 ring-lime-500 rounded-md text-gray-800 p-2 text-sm"
                                rows="2"
                                required
                                ></textarea>
                                @error('reply')
                                    <div class="text-red-500 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="flex w-full justify-end">
                                    <button
                                    type="submit"
                                    class="w-fit bg-lime-400 px-2 p-0.5 rounded-md text-sm text-white"
                                    >
                                    Reply
                                    </button>
                                </div>
                            </form>
                        </div>
                       @endauth
                    </div>
                    @endforeach
                    <script src="{{ asset('js/comment.js') }}"></script>
                </div>
            </div>
        @endif
        <div class="mt-5 max-w-lg">
            <form action="{{ route('comment.create', $article) }}" method="post">

                @csrf
                <div class="mb-2">
                    <label class="sr-only" for="name">Name</label>
                    <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Your name"
                    class="w-full ring-1 ring-lime-500 rounded-md text-gray-800 p-2"
                    required
                    autocomplete="name"
                    @error('name')
                        autofocus
                    @enderror
                    >
                    @error('name')

                    @enderror
                </div>

                <div class="mb-2">
                    <label class="sr-only" for="email">Email</label>
                    <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Your email address"
                    class="w-full ring-1 ring-lime-500 rounded-md text-gray-800 p-2"
                    required
                    autocomplete="email"
                    @error('email')
                        autofocus
                    @enderror
                    >
                    @error('email')

                    @enderror
                </div>

                <div class="">
                    <label for="comment" class="sr-only">Comment</label>
                    <textarea
                    name="comment"
                    placeholder=" Type comment here..."
                    class="w-full ring-1 ring-lime-500 rounded-md text-gray-800 p-2"
                    rows="5"
                    required
                    maxlength="500"
                    minlength="20"
                    @error('comment')
                        autofocus
                    @enderror
                    ></textarea>
                    @error('comment')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

               <div class="flex w-full justify-end">
                    <button
                    type="submit"
                    class="uppercase bg-lime-400 p-1.5 text-white rounded-md outline-none text-sm"
                    >
                    Comment
                    </button>
               </div>
            </form>
        </div>
   </div>
@endsection
