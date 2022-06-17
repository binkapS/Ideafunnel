@extends('layouts.response')

@section('content')
<div class="h-full flex justify-center items-center my-60">
    <div class="space-x-1 bg-white px-3 py-5 text-2xl font-semibold rounded-md text-gray-600 border-2 border-gray-700">
        <span>{{ $code }}</span>
        <span>|</span>
        <span>{{ $message }}</span>
    </div>
</div>
@endsection
