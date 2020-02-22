@extends('front.layout')

@section('title')Hablar @stop

@section('meta')

@stop

@section('main')
    <div class="layout_body">
        <div class="content_left" id="app">
            <div class="page-header page-header_110">
                <h1 class="page-header__title">Sorgu üçün axtarış nəticələri: {{ $query }}</h1>
            </div>
            <div class="post-content__item">
                <ul class="content-list">
                    @if ($posts->count() !== 0)
                        <h3>Paylaşmalar</h3>
                        @foreach ($posts as $post)
                            <li>
                                <div class="list-hubs__hub">
                                    <div class="list-hubs__obj-body">
                                        <div class="list-hubs__title-link">{{ $post->name }}</div>
                                        <div class="list-hubs__desc">{!! $post->body !!}</div>
                                        <div class="list-hubs__desc">Baxilib: {{ $post->views }}</div>
                                    </div>
                                    <div class="list-hubs__stats-value">
                                        {{ $post->votes }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    @if ($hubs->count() !== 0)
                        <h3>Hablar</h3>
                        {{-- {{ dd($hubs->posts_count) }} --}}
                        @foreach ($hubs as $hub)
                            <li>
                                <div class="list-hubs__hub">
                                    <img class="list-hubs__hub-image" src="{{$hub->logo}}" alt="">
                                    <div class="list-hubs__obj-body">
                                        <div class="list-hubs__title-link">{{ $hub->name }}</div>
                                        <div class="list-hubs__desc">{{ $hub->description }}</div>
                                        <div class="list-hubs__desc">Postlar: {{ $hub->posts_count }}, Followers: 2
                                        </div>
                                    </div>
                                    <div class="list-hubs__stats-value">
                                        {{ $hub->raiting }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
