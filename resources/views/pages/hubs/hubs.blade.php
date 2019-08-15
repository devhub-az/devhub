@extends('front.layout')

@section('title')Hablar @stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@stop

@section('main')
<div class="layout_body">
	<div class="hubs-page__header">
		<div class="hubs-header__title">
			<h1>Hablar</h1>
			<h4>Hablar müəyyən mövzularda nəşrlərin yerləşdirildiyi bölmələrdir. Onlar yalnız saytdakı bütün məlumatları rahat şəkildə qurulmasına deyil, həm də istifadəçi qidasının formalaşmasına kömək edir - yalnız maraqlı olan ocaqlara yazılmaq.</h4>
		</div>
		<div>
			<a href="#" class="btn btn-primary btn-success-outline"><span>Hab təklif etmək</span></a>
		</div>
	</div>
	<div class="layout_content">
		<div class="content_left" id="app">
			<form id="form-hub__search" action="/search-result" class="form-hub__search" accept-charset="UTF-8" method="POST">
				{!! Form::token() !!}
				<div class="header_search">
					<input id="search_input" type="text" class="search" autocomplete="off" name="search" maxlength="48" minlength="3" placeholder="Paylasma ya hub axtar" required="required">
					<i class="icon feather icon-search"></i>
				</div>
			</form>
			<div class="post-content__item">
				<hubs-list></hubs-list>
			</div>
		</div>
		{{-- Right --}}
		<div class="content_right">
		    <div id="default-block" class="default-block default-block_sidebar">
		        <div class="default-block__header">
		            <h3 class="default-block__header-title">Ən sevimli hablar</h3>
		        </div>

		        <div class="default-block__content">
		            <ul>
		            	@foreach ($top_hubs as $hub)
		            		<li style="display: grid; grid-template-columns: 30% 70%;">
		            			<img class="list-hubs__hub-image" src="{{ $hub['logo'] ?? '/images/empty/code.png' }}" alt="">
		            			<div class="list-hubs__obj-body">
		            			    <div class="list-hubs__title-link"> <a href="/hubs/{{ $hub['id'] ?? '' }}">{{ $hub['name'] }}</a></div>
		            			    <div class="list-hubs__desc"><i class="icon feather icon-bar-chart-2"></i> {{ $hub['raiting'] }}</div>
		            			</div>
		            		</li>
		            	@endforeach
		            </ul>
		        </div>
		    </div>
		    <div id="default-block" class="default-block default-block_sidebar">
		        <div class="default-block__header">
		            <h3 class="default-block__header-title">Ən izləninən hablar</h3>
		        </div>

		        <div class="default-block__content">
		            <ul>
		            	@foreach ($top_followed_hubs as $hub)
		            		<li style="display: grid; grid-template-columns: 30% 70%;">
		            			<img class="list-hubs__hub-image" src="{{ $hub['logo'] ?? '/images/empty/code.png' }}" alt="">
		            			<div class="list-hubs__obj-body">
		            			    <div class="list-hubs__title-link"> <a href="/hubs/{{ $hub['id'] ?? '' }}">{{ $hub['name'] ?? '' }}</a></div>
		            			    <div class="list-hubs__desc"><i class="icon feather icon-users"></i> {{ $hub['hub_followers_count'] ?? '' }}</div>
		            			</div>
		            		</li>
		            	@endforeach
		            </ul>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection