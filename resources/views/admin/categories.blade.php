@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="flex bg-white flex-col h-fit m-2 p-3">
            <span class="text-gray-500 text-center my-2 font-bold uppercase text-lg">Create new category</span>
            <form action="{{ route('admin.categories') }}" method="post" class="flex flex-col">
                @csrf

                <div class="flex flex-col mb-2">
                    <label class="sr-only" for="category">Category</label>
                    <input type="text" name="category" placeholder="Category name" value="{{ old('category') }}"
                        class="p-2 text-gray-800 outline-none border-2 border-gray-700 rounded-md" required>
                    @error('category')
                        <span class="auth-error">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn-primary">Create</button>
            </form>
        </div>
        <div class="flex bg-white flex-col h-fit m-2 p-3">
            <span class="text-gray-500 text-center my-2 font-bold uppercase text-lg">Categories</span>
            @if ($categories->count() > 0)
                @foreach ($categories as $category)
                    <div class="flex flex-col">
                        <a href="{{ route('category', $category) }}"
                            class=" mx-1 bg-gray-100 py-1 border-l-4 pl-2 border-l-gray-400">
                            {{ $category->name }}
                        </a>
                        <div class="flex text-xs text-gray-400 justify-start items-center my-1 mx-3 space-x-3">
                            <i class="fa fa-clock-o"> Created {{ $category->created_at->diffForHumans() }}</i>
                            <i class="fa fa-user">
                                {{ $category->creator->id == auth()->id() ? 'You' : $category->creator->username }}</i>
                            <?php $articleCount = count($category->articles ?? []); ?>
                            <i class="fa fa-book"> {{ $articleCount }}
                                {{ Str::plural('Article', $articleCount) }}</i></span>
                        </div>
                        <div class="flex justify-between items-center text-sm mx-2">
                            <a href="{{ route('admin.category', $category) }}"
                                class="text-blue-400 cursor-pointer">Edit</a>
                            <form action="{{ route('admin.category', $category) }}" method="post"
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
                <div class="flex justify-center items-center py-2">
                    {{ $categories->links() }}
                </div>
            @else
                <span class="h-full w-full flex justify-center items-center text-blue-400 font-semibold">
                    No categories yet
                </span>
            @endif
        </div>
    </div>
@endsection
