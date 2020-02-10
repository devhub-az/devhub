@extends('front.layout')

@section('title')Saved @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/saved.css') }}">
@stop

@section('main')
    <div class="layout_body">
        <div class="header">
            <div class="nav_posts">
                <a href="{{ route('saved-posts') }}">nfiskfdkhdkj</a>
                <a href="{{ route('saved-comments') }}">Posts</a>
            </div>
        </div>
    </div>
@endsection
