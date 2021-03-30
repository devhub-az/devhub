@extends('layouts.layout')

@section('title')Saved @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/saved.css') }}">
@stop

@section('main')
    <div class="layout_body" id="app">
        <div class="header">
            <div class="nav_articles">
                <a href="{{ route('saved-articles') }}">Posts</a>
                <a href="{{ route('saved-comments') }}">Comments</a>
            </div>
        </div>
        <articles
            :url="'{{ $url }}'"
            @auth :auth_check="true" @endauth
        ></articles>

    </div>
@endsection
