@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/conversation.css') }}">
@stop

@section('main')
    <div class="layout_body">
        <div class="container">
            @include('pages.conversations.users', ['users' => $users, 'unread' => $unread, 'last_message' => $last_message, 'last_message_time' => $last_message_time])
            <div class="conversations">
                <div class="conversations__card-header">
                    <h4>
                        {{ $user->username }}
                    </h4>
                    <p>
                        {{ $user->about ?? '' }}
                    </p>
                </div>
                <div class="conversations__card-body">
                    @if ($messages->hasMorePages())
                        <div class="conversations__pagination">
                            <a href="{{ route('conversations.show', $user->id) . $messages->nextPageUrl() }}"
                               class="btn btn-light text-muted">
                                əvvəlki...
                            </a>
                        </div>
                    @endif
                    @foreach(array_reverse($messages->items()) as $message)
                        @if ($message->user->id !== $user->id)
                            <div class="conversations__message">
                                <div class="conversations__from conversations__to">
                                    <span>{!! nl2br(e(decrypt($message->content))) !!}</span>
                                </div>
                                <span class="time_date">oxunub: {{ $message['read_at'] ? Carbon\Carbon::parse($message['read_at'])->format('H:i') . ' | ' . Carbon\Carbon::parse($message['read_at'])->diffForHumans() : '' }}</span>
                            </div>
                        @else
                            <div class="conversations__message">
                                <div class="conversations__from ">
                                    <div class="conversations__chat-name">
                                        <strong>{{ $message->user->username }}</strong>
                                        <div class="msg-info-time">{{ Carbon\Carbon::parse($message['created_at'])->format('H:i') }}</div>
                                    </div>
                                    <span>{!! nl2br(e(decrypt($message->content))) !!}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @if ($messages->previousPageUrl())
                        <div class="conversations__pagination">
                            <a href="{{ route('conversations.show', $user->id) . $messages->previousPageUrl() }}"
                               class="btn btn-light text-muted">
                                sonrakı...
                            </a>
                        </div>
                    @endif
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
@endsection

{{--@foreach($messages as $message)--}}
{{--    <div class="message @if($message->from_id == Auth::user()->id) {{ "right" }} @endif">--}}
{{--        <div class="bubble">--}}
{{--            {{ $message->content }}--}}
{{--            <div class="corner"></div>--}}
{{--            <span>3 min</span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endforeach--}}
