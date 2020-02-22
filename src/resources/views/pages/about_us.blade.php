@extends('front.layout')

@section('title')Haqqımızda @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@stop

@section('main')

    <div class="about__content">
        <section class="about__head">
            <div class="about__header_block">
                <h1 class="about__header"><span class="about__logo">DevHub</span> — yaradıcılıq üçün imkanlar</h1>
                <p>DevHub помогает Азербайджанским программистам без лишних трудностей делиться своими знаниями и
                    опытом.</p>
            </div>
        </section>
        <section class="about__body">
            <div class="about__info_block">
                <h1>Haqqımızda</h1>
                <p>DevHub, Azərbaycanda proqramlaşdırma inkişaf səviyyəsini artırmaq istəyən gənc bir inkişaf
                    qrupudur.</p>
            </div>
            <div class="about__info_block">
                <h1>Внесите свой вклад</h1>
                <p>İlk paylaşmanı yazın və DevHub-a dəstək olun</p>
                <a href="{{ route('create_post') }}" class="btn btn-primary button_add button_about">
                    İlk paylaşmanı yazmaq
                </a>
            </div>

        </section>
    </div>

@endsection

@section('scripts')
@endsection
