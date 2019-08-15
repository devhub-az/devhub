@extends('front.layout')

@section('title')Əsas səhifə@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@stop

@section('main')
<div class="layout_body">
    <div class="layout_content">
        <div class="content_left" id="app">
            <div class="header">
                <ul class="nav_posts">
                    <a href="{{ route('home') }}" class="nav-posts__item @if(Request::is('top/*') || Request::is('/')) nav-posts__item-link_current @endif">
                        <span class="nav-posts__item-link">Ən yaxşı</span>
                    </a>
                    <a href="{{ route('all') }}" class="nav-posts__item @if(Request::url() === route('all')) nav-posts__item-link_current @endif">
                        <span class="nav-posts__item-link">Bütün yazılar</span>
                    </a>
                    @auth
                        @if (Auth::user()->getUserIdsAttribute() !== null)
                            <a href="{{ route('favorite') }}" class="nav-posts__item @if(Request::url() === route('favorite')) nav-posts__item-link_current @endif">
                                <span class="nav-posts__item-link">Abunə ilə</span>
                            </a>
                        @endif
                    @endauth
                </ul>
            </div>
            @if (Request::is('top/*') || Request::is('/'))
                <div class="tabs__level tabs__level_bottom">
                    <ul class="toggle-menu ">
                        <li class="toggle-menu__item">
                            <a href="{{ url('/') }}" class="toggle-menu__item-link @if(Request::url() === url('/')) toggle-menu__item-link_active @endif" rel="nofollow" title="Лучшие публикации за сутки">
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
            <posts :survey-data="'{{ $url }}'" @auth :auth_check="true" @endauth></posts>
        </div>

        {{-- Right --}}
        <div class="content_right">
            <div class="default-block default-block_sidebar">
              <div class="default-block__header">
                <h3 class="default-block__header-title">Sponsorlar</h3>
              </div>

              <div class="default-block__content">
                <ul class="content-list content-list_partners-block">
                    <li class="content-list__item content-list__item_partners-block">
                        <a href="https://u.tmtm.ru/kryptonite-startup" rel="nofollow" class="partner-info">
                            <div class="partner-info__head">
                                <span class="partner-info__title">Azərkosmos</span>
                                <img src="https://res-4.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_256,w_256,f_auto,q_auto:eco/v1493023812/v9fu3nxdrblcxfxcz6io.png" class="partner-info__image">
                            </div>
                            <div class="partner-info__description">
                                Cənubi Qafqazda ilk peyk operatoru olan “Azərkosmos”.
                            </div>
                        </a>
                    </li>
                  <li class="content-list__item content-list__item_partners-block">
                    <a href="https://u.tmtm.ru/ru-rub" rel="nofollow" class="partner-info">
                      <div class="partner-info__head">
                        <span class="partner-info__title">RISK Company</span>
                        <img src="https://risk.az/site/templates/images/logo_large.jpg" class="partner-info__image">
                      </div>

                      <div class="partner-info__description">
                        R.I.S.K. Company is one of the leading IT companies in the Central Asia and Caucasus markets providing solutions in IT consultancy
                      </div>
                    </a>
                  </li>
                </ul>
              </div>

              <div class="default-block__footer">
                <a href="https://habr.com/ru/info/help/sponsorship-info/" class="default-block__footer_link">Necə sponsor olum?</a>
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
</div>

@endsection

@section('scripts')
<script>
    var stickyblock = stickybits('#default-block', {
        stickyBitStickyOffset: 10
    });
</script>
@endsection