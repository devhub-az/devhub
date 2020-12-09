@extends('layouts.layout')

@section('title')Paylaşma yazmag @stop

@section('main')
    <div class="layout_body" id="app" onload="prettyPrint()">
        <div class="layout_content">
            <div class="page-header page-header_110">
                <h1 class="page-header__title">Paylaşma yazmag</h1>
            </div>
{{--<div class="edit-content">--}}
{{--                @if($errors->any())--}}
{{--                    <div id="error" style="display: none"></div>--}}
{{--                @endif--}}
{{--                {!! Form::open(['id' => 'form', 'url' => 'posts', 'method' => 'POST']) !!}--}}
{{--                @csrf--}}
{{--                {!! Form::label('title', 'Başlıq:') !!}--}}

{{--                {!! Form::text('title', null, ['class' => 'post__title', 'id' => 'title', 'placeholder' => 'Nəşrin nə olacağını başa düşmək üçün başlıq məna ilə doldurulmalıdır.', 'autocomplete' => 'off']) !!}--}}

{{--                @if($errors->has('title'))--}}
{{--                    <div class="description">--}}
{{--                        <p style="color: red"> {{ $errors->first('title') }}</p>--}}
{{--                    </div>--}}
{{--                @endif--}}


{{--                {!! Form::label('body', 'Mətn:') !!}--}}
{{--                <div class="wmd-panel">--}}
{{--                    <div id="wmd-button-bar"></div>--}}
{{--                    <textarea class="wmd-input" id="wmd-input" name="body"></textarea>--}}
{{--                </div>--}}
{{--                @if($errors->has('body'))--}}
{{--                    <div class="description">--}}
{{--                        <p style="color: red"> {{ $errors->first('body') }}</p>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                <div id="content"></div>--}}
{{--                <div id="wmd-preview" class="wmd-panel wmd-preview"></div>--}}

{{--                <div class="ui fluid multiple search selection dropdown">--}}
{{--                    <input name="tags" type="hidden">--}}
{{--                    <i class="dropdown icon"></i>--}}
{{--                    <div class="default text">Skills</div>--}}
{{--                    <div class="menu">--}}
{{--                        @foreach ($hubs as $hub)--}}
{{--                            <div class="item" data-value="{{ $hub['id'] }}">--}}
{{--                                <i class="{{ strtolower($hub['name']) }} icon"></i>--}}
{{--                                {{ $hub['name'] }}--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                {!! Form::submit('Paylaşımı əlavə etmək', ['id' => 'submit', 'class' => 'btn btn-primary submit']) !!}--}}

{{--                {!! Form::close() !!}--}}
{{--            </div>--}}
            @include('pages.posts.form')


            <div class="content_right">
                <div class="default-block default-block_sidebar">
                    <div class="default-block__header">
                        <h3 class="default-block__header-title">Yazmağdan əvvəl</h3>
                    </div>
                    <div class="default-block__content">
                        <div class="create-page__info-block">
                            <i class="icon feather icon-check-circle"></i>
                            <div>
                                Paylaşma saytın qaydalarını pozmamalıdır.
                            </div>
                        </div>
                        <hr>
                        <div class="create-page__info-block">
                            <i class="icon feather icon-book-open"></i>
                            <div>
                                Старайтесь оформлять публикации так, чтобы их было удобно читать.
                            </div>
                        </div>
                    </div>
                </div>

                <div id="rule" class="default-block default-block_sidebar">
                    <div class="default-block__header">
                        <h3 class="default-block__header-title">
                            Moderasiya haqqında
                        </h3>
                    </div>
                    <div class="default-block__content">
                        <h4 class="default-block__paragraph">Nədən yazmağ olmaz:</h4>
                        <ul class="default-block__list">
                            <li>reklam və PR paylaşmaları</li>
                            <li>xəbərlər və elanlar</li>
                            <li>vakansiyalar</li>
                            <li>əvvəllər digər saytlarda yayımlanan məqalələr</li>
                            <li>şirkətlər və göstərilən xidmətlər barədə şikayətlər</li>
                            <li>aşağı keyfiyyətli tərcümələr</li>
                            <li>izahat vermədən proqram kodunun hissələri</li>
                            <li>bir sözlü məqalələr</li>
                            <li>İT-mövzularla zəif əlaqəli və ya ümumiyyətlə əlaqəli olmayan məqalələr</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
