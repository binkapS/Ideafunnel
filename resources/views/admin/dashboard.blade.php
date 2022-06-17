@extends('layouts.admin')

@section('content')
{{ auth()->user()->username }}
@endsection
