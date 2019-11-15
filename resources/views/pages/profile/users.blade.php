@extends('front.layout')

@section('title')Hablar @stop

@section('meta')

@stop

@section('main')
<div class="layout_body">
	<div class="content_left" id="app">
		<div class="page-header page-header_110">
			<h1 class="page-header__title">İnsanlar</h1>
		</div>
		<div class="post-content__item">
			<ul class="sort-panel" style="display: flex;
			    flex: 0 1 auto;
			    list-style: none;
			    border-bottom: 1px solid #d5dddf;
			    /* border-bottom: 1px solid; */
			    padding-bottom: 12px;">
			 	<li class="sort-panel__item">
			    	<span class="sort-panel__item-toggler">Имя</span>
			  	</li>

				<li class="sort-panel__item">
			    	<span class="sort-panel__item-toggler">Карма</span>
			 	</li>

				<li class="sort-panel__item">
			    	<span class="sort-panel__item-toggler active">↓&nbsp;Рейтинг</span>
				</li>
			</ul>
		</div>
        <users-list> </users-list>

	</div>
</div>
@endsection

@section('scripts')
@endsection
