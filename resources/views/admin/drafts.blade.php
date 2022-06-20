@extends('layouts.admin')

@section('content')
<div class="bg-white p-3 m-2 overflow-y-scroll h-screen">
    @forelse ($drafts as $draft)
    <div class="flex flex-col">
        <span class="attention my-2">{{ $draft->topic }}</span>
        <div class="flex justify-between w-full items-center">
            <a href="{{ route('draft.edit', $draft) }}" class="btn-primary">Edit</a>
            <form action="{{ route('admin.draft', $draft) }}" method="post">
                @csrf
                <button type="submit" class="btn-primary">Publish</button>
            </form>
            <form action="{{ route('admin.draft', $draft) }}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn-primary bg-red-600 hover:bg-red-700">Delete</button>
            </form>
        </div>
    </div>
    @empty
        <span class="w-full flex justify-center items-center h-full text-lg font-semibold text-blue-400">
            Not draft found
        </span>
    @endforelse
</div>
@endsection
