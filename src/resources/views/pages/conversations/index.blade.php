@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/conversation.css') }}">
@stop

@section('main')
    {{--        @include('pages.conversations.users', ['users' => $users, 'unread' => $unread])--}}
    <div class="layout_body">
        <div class="container">
            @include('pages.conversations.users', ['users' => $users, 'unread' => $unread, 'last_message' => $last_message, 'last_message_time' => $last_message_time])
            <div class="conversations">
                <div class="conversations__card-body">
                    <div id="app" style="width: 100%; text-align: center; opacity: .7; margin-top: auto">
                        <img v-lazy="'/images/errors/lazy.png'" alt="" width="250"/>
                    </div>
                </div>
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input name="content" placeholder="Text message" \>
                    </div>
                    <button type="submit" class="btn btn-primary">Send <i class="icon feather icon-send"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
