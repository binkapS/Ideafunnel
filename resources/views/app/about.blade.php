@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-screen">
        {{ 'About ' . config('app.name') }}
    </div>
@endsection
