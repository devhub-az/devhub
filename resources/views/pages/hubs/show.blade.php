@extends('front.layout')

@section('title'){{ $hub['name'] }} @stop

@section('main')
	<div class="layout_body">
    	<div class="hub-block">
    		<div class="hub-page__header">
    			@if (isset($hub['logo']))
    				<img class="list-hubs__hub-image" :src="{{ $hub['logo']}}" alt="">
    			@else
    				<img class="list-hubs__hub-image" src="{{ asset('/images/empty/code.png') }}" alt="">
    			@endif
    		    <div class="list-hubs__obj-body">
    		        <div class="list-hubs__title-link">{{ $hub['name'] }}</div>
    		        <div class="list-hubs__desc">{{ $hub['description'] }}</div>
    		        <div class="list-hubs__desc">Postlar: {{ $posts_count }} | Followers: {{ $hub['hub_followers_count'] }}</div>
    		    </div>
    		    <div class="list-hubs__stats-value">
    		        {{ $hub['raiting'] }}
    		    </div>
    		    @if ($hub['follower_check'])
    		    	<span class="btn btn-success hub_follow btn-sm">{{ $hub['hub_followers_count'] }} İzləmək</span>
    		    @elseif(!$hub['follower_check'])
    		    	<span class="btn btn-success-outline hub_follow btn-sm">{{ $hub['hub_followers_count'] }} İzləyirsiniz</span>
    		    @endif
    		</div>
    	</div>
		
		<div class="header">
		    <ul class="nav_posts">
		        <a href="{{ route('home') }}" class="nav-posts__item @if(Request::is('hubs/*')) nav-posts__item-link_current @endif">
		            <span class="nav-posts__item-link">Ən yaxşı</span>
		        </a>
		        <a href="{{ route('all') }}" class="nav-posts__item @if(Request::url() === route('all')) nav-posts__item-link_current @endif">
		            <span class="nav-posts__item-link">Bütün yazılar</span>
		        </a>
		    </ul>
		</div>
		<div class="layout_content" id="app">
			@if (Request::is('hubs/*'))
			    <div class="tabs__level tabs__level_bottom">
			        <ul class="toggle-menu ">
			            <li class="toggle-menu__item">
			                <a href="{{ url('/') }}" class="toggle-menu__item-link @if(Request::is('hubs/*')) toggle-menu__item-link_active @endif" rel="nofollow" title="Лучшие публикации за сутки">
			                    Gün
			                </a>
			            </li>
			            <li class="toggle-menu__item">
			                <a href="{{ url('top/week') }}" class="toggle-menu__item-link @if(Request::url() === url('top/week')) toggle-menu__item-link_active @endif" rel="nofollow" title="Лучшие публикации за неделю">
			                    Həftə
			                </a>
			            </li>
			            <li class="toggle-menu__item">
			                <a href="{{ url('top/month') }}" class="toggle-menu__item-link @if(Request::url() === url('top/month')) toggle-menu__item-link_active @endif" rel="nofollow" title="Лучшие публикации за месяц">
			                    Ay
			                </a>
			            </li>
			        </ul>
			    </div>
			@endif

			<posts :survey-data="'{{ $url }}'" :hub="'{{ $hub['id'] }}'" @auth :auth_check="true" @endauth></posts>
		</div>
	</div>
@endsection

@section('scripts')
@endsection