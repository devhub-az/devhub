@extends('front.layout')

@section('title'){{ ucfirst($user['username']) }} @stop

@section('meta')

@stop

@section('main')
<div class="profileHeader">
	<div class="profileHeader__info">
		<div class="profileHeader__edit">
		    <div class="profileHeader__chooserWrapper right" tabindex="0">
		        <div class="headerImageEditChooser">
		        	@auth
		        		@if (Auth::user()->id == $user->id)
		        			<a class="btn btn-s"><i class="icon feather icon-camera"></i> Başlıq şəkli yükləyin</a>
		        		@endif
		        	@endauth
		        	<a class="btn btn-s"><i class="icon feather icon-more-horizontal"></i></a>
				</div>
		    </div>
		</div>
		<div class="profileHeaderInfo sc-media">
			<div class="profileHeaderInfo__avatar sc-media-image">
    			<div class="image m-user image__noOutline readOnly customImage interactive sc-artwork sc-artwork-placeholder-7 image__rounded m-loaded" tabindex="0" style="height: 200px; width: 200px;">
					{{-- <span style="background-image: url({{ asset($user->getMedia('avatars')->first()->getUrl('big')) }});" class="image__rounded" aria-label="High Music’s avatar" aria-role="img"></span> --}}
				</div>

			</div>
			<div class="profileHeaderInfo__content sc-media-content">
  				<h3 class="profileHeaderInfo__userName">
    				{{ ucfirst($user['name']) }} <i class="icon feather icon-at-sign"></i>{{ $user['username'] }}
  				</h3>
    			<br>
    			<h4 class="profileHeaderInfo__additional" style="margin-top: 12px;">{{ $user['about'] }}</h4>
			</div>
			<div class="profile_buttons">
				@auth
					@if(Auth::user()->id == $user->id)
						<a href="{{ route('create_post') }}" class="btn profile_user-message" style="margin-left: 0;">
							<i class="icon feather icon-mail"></i> Yazmağ
						</a>
					@elseif(!$isFollowing)
						<a href="{{ route('user.follow', $user->id) }}" onclick="event.preventDefault(); document.getElementById('follow').submit();" class="btn profile_user-connect">Abunə olun <span class="followers">{{ \Numeric::number_format_short(count($user['followers'])) }}</span></a>
						<a href="{{ route('create_post') }}" class="btn profile_user-message">
							<i class="icon feather icon-mail"></i> Yazmağ
						</a>
					@elseif($isFollowing)
						<a href="{{ route('user.follow', $user->id) }}" onclick="event.preventDefault(); document.getElementById('unfollow').submit();" class="btn profile_user-connected">Abunəsiz <span class="followers">{{ \Numeric::number_format_short(count($user['followers'])) }}</span></a>
						<a href="{{ route('create_post') }}" class="btn profile_user-message">
							<i class="icon feather icon-mail"></i> Yazmağ
						</a>
					@endif
				@endauth
				@guest
					<a href="{{ route('user.follow', $user->id) }}" onclick="event.preventDefault(); document.getElementById('folow').submit();" class="btn profile_user-connect">Abunə olun <span class="followers">{{ \Numeric::number_format_short(count($user['followers'])) }}</span></a>
					<a href="{{ route('create_post') }}" class="btn profile_user-message">
						<i class="icon feather icon-mail"></i> Yazmağ
					</a>
				@endauth
			</div>
		</div>
		<div class="user-folowers">
			<div class="artist__listeners__count">{{ number_format(1123123 . count($user['followers'])) }}</div>
			<div class="artist__listeners__label">Onu Izləyənlər</div>
		</div>
	</div>

	<div class="profileHeaderBackground m-visualLoaded">
		<div class="profileHeaderBackground__visual" style="background: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);"></div>
	</div>
</div>
<div class="layout_body" style="padding: 0; margin: 20px auto; width: 90%;">
    <div class="content_left" id="app">
        <div class="header">
            <ul class="nav_posts">
                <a href="{{ route('home') }}" class="nav-posts__item @if(Request::is('top/*') || Request::is('/')) nav-posts__item-link_current @endif">
                    <span class="nav-posts__item-link">Məlumat</span>
                </a>
                <a href="{{ route('all') }}" class="nav-posts__item @if(Request::url() === route('all')) nav-posts__item-link_current @endif">
                    <span class="nav-posts__item-link">Abune olub</span>
                </a>
                @auth
                <a href="{{ route('favorite') }}" class="nav-posts__item @if(Request::url() === route('favorite')) nav-posts__item-link_current @endif">
                    <span class="nav-posts__item-link">Paylasmalar</span>
                </a>
                <a href="{{ route('favorite') }}" class="nav-posts__item @if(Request::url() === route('favorite')) nav-posts__item-link_current @endif">
                    <span class="nav-posts__item-link">Yadda saxlanmış</span>
                </a>
                @endauth
            </ul>
        </div>
    </div>

    {{-- Right --}}
    <div class="content_right">
        <div class="default-block default-block_sidebar">
         	<div class="default-block__header">
            	<h3 class="default-block__header-title">Məlumat</h3>
         	</div>

        	<div class="default-block__content">
            	<table class="info" style="width:100%">
            		<tr>
	            	    <td class="label">Qeydiyyatan kecib</td>
	            	    <td>{{ Carbon\Carbon::parse($user->created_at)->isoFormat('DD MMMM YYYY') }}</td>
            	  	</tr>
            	</table>
          	</div>
        </div>

        <div id="default-block" class="default-block default-block_sidebar">
            <div class="default-block__header">
                <h3 class="default-block__header-title">Title</h3>
            </div>

            <div class="default-block__content">
                Content
            </div>
        </div>
    </div>
</div>
<form id="follow" action="{{ route('user.follow', $user->id) }}" method="POST">
	{{ csrf_field() }}
</form>
<form id="unfollow" action="{{ route('user.un_follow', $user->id) }}" method="POST">
	{{ csrf_field() }}
</form>
@endsection

@section('scripts')
@endsection
