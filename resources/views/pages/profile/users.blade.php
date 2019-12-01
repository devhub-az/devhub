@extends('front.layout')

@section('title')Hablar @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@stop

@section('main')
    <div class="layout_body">
        <div class="layout_content">
            <div class="content_left" id="app">
                <div class="page-header page-header_110">
                    <h1 class="page-header__title">İnsanlar</h1>
                </div>
                <users-list></users-list>
            </div>
            <div class="content_right">

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
