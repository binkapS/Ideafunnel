@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center bg-white mx-2 my-4 rounded-md p-3">
        <div class="w-full -skew-x-12 mb-1">
            <span
                class="uppercase text-sm relative left-2 bg-red-500 text-white px-2 py-0.5 rounded-sm">{{ $article->cat->name }}</span>
        </div>
        <div class="text-xl font-bold text-center">
            {{ $article->topic }}
        </div>
        <div class="flex my-2 flex-row w-full justify-start items-center space-x-2">
            @if ($article->aut->hasProfileImage())
                <img src="{{ $article->aut->getProfileImage() }}" alt="{{ $article->aut->username }}'s picture"
                    class="rounded-full w-12 h-12">
            @else
                <img src="{{ asset('images/logo_icon.png') }}" alt="{{ $article->aut->username }}'s picture"
                    class="rounded-full w-12 h-12">
            @endif
            <div class="flex flex-col space-y-0 text-sm">
                <a href="{{ route('author.profile', $article->aut) }}">By <span
                        class="uppercase text-blue-400">{{ $article->aut->username }}</span></a>
                <span class="space-x-3 text-gray-500"><i class="fa fa-clock-o">
                        {{ $article->created_at->diffForHumans() }}</i><i class="fa fa-comments-o"> {{ $commentCount }}
                        {{ Str::plural('Comment', $commentCount) }}</i></span>
            </div>
        </div>
        @if ($article->hasImage())
            <img class="rounded-md max-w-xs max-h-60 md:max-w-lg md:max-h-96 mb-3" src="{{ $article->getImage() }}"
                alt="{{ $article->topic }}">
        @endif
        <p class="block flex-none text-gray-700">
            <?= body($article->body, true) ?>
        </p>
        @if (count($tags) > 0)
            <div class="flex justify-start items-center w-full mt-3 space-x-2">
                <i class="fa fa-tag text-gray-500"></i>
                @foreach ($tags as $tag)
                    <span class="bg-lime-500 py-0.5 px-1 text-white rounded-sm text-xs text-center">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>
        @endif
        @if ($commentCount > 0)
            <div class="flex my-5 justify-center items-center">
                <button id="comment-toggle"
                    class="text-sm relative text-white bg-lime-500 px-2 py-0.5 uppercase -skew-x-12 rounded-sm w-fit cursor-pointer">
                    Show Comments
                </button>
            </div>
            <div class="hidden flex-col space-y-2 justify-start items-start w-full" id="comments-main">
                @foreach ($article->comments as $comment)
                    <div class="flex space-x-3 text-gray-500 text-xs">
                        <i class="fa fa-user-o"> {{ $comment->author }}</i>
                        <i class="fa fa-clock-o"> {{ $comment->created_at->diffForHumans() }}</i>
                    </div>
                    <div class="attention">
                        <span class="flex-none text-sm">
                            {!! body($comment->body, true) !!}
                        </span>
                    </div>
                @endforeach
            </div>
            <script>
                const commentToggle = document.querySelector("#comment-toggle"),
                    commentMain = document.querySelector("#comments-main");
                let editForms = document.querySelectorAll('#comment-edit');
                let replyForms = document.querySelectorAll('#comment-reply');
                let editBtns = document.querySelectorAll('#edit-comment');
                let replyBtns = document.querySelectorAll('#reply-comment');
                var commentVisible = false;
                commentToggle.addEventListener('click', () => {
                    if (commentVisible) {
                        commentToggle.innerText = "Show Comments";
                        commentMain.style.display = "none";
                        commentVisible = false;
                    } else {
                        commentToggle.innerText = "Hide Comments";
                        commentMain.style.display = "flex";
                        commentVisible = true;
                    }
                });
            </script>
        @endif
        <button class="uppercase text-sm border border-gray-900 py-1 px-5 my-3 rounded-md text-gray-900 font-semibold"
            id="comment-form-toggle">
            Click to comment
        </button>
        <div class="hidden" id="comment-form">
            <form action="{{ route('comment.create', $article) }}" method="post">

                @csrf
                @guest()
                    <div class="mb-2">
                        <label class="sr-only" for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Your name"
                            class="w-full ring-1 ring-lime-500 rounded-md text-gray-800 p-1.5" required autocomplete="name"
                            @error('name') autofocus @enderror>
                        @error('name')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label class="sr-only" for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Your email address"
                            class="w-full ring-1 ring-lime-500 rounded-md text-gray-800 p-1.5" required autocomplete="email"
                            @error('email') autofocus @enderror>
                        @error('email')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endguest

                <div class="">
                    <label for="comment" class="sr-only">Comment</label>
                    <textarea name="comment" placeholder=" Type comment here..."
                        class="w-full ring-1 ring-lime-500 rounded-md text-gray-800 p-2" rows="5" required maxlength="1000"
                        minlength="20" @error('comment') autofocus @enderror></textarea>
                    @error('comment')
                        <div class="text-red-500 text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex w-full justify-end">
                    <button type="submit" class="uppercase bg-lime-400 px-3 text-white rounded-md outline-none text-sm">
                        Post Comment
                    </button>
                </div>
            </form>
        </div>
        <script>
            const commentFormToggle = document.querySelector("#comment-form-toggle"),
                commentForm = document.querySelector("#comment-form");
            var commentFormActive = false;
            commentFormToggle.addEventListener('click', () => {
                if (commentFormActive) {
                    commentForm.style.display = "none";
                    commentFormActive = false;
                } else {
                    commentForm.style.display = "flex";
                    commentFormActive = true;
                }
            });
        </script>
    </div>
@endsection
