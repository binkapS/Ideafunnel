@extends('layouts.response')

@section('title', __('Not Found'))
@section('code', $code ?? '404')
@section('message', __($message ?? 'Not Found'))
