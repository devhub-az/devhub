@extends('front.layout')

@section('title')Hablar @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
@stop

@section('main')
    <div class="layout_body">
        <div class="layout_content">
            <div class="content_left" id="app">
                <div class="users__page-header">
                    <h1>Müəlliflər</h1>
                </div>
                <users-list @auth :auth_check="true" @endauth></users-list>
            </div>
            <div class="content_right">

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
