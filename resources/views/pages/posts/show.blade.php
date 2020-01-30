@extends('front.layout')

@section('title'){{ $post['name'] }} @stop

@section('meta')
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="{{ $post['name'] }}">
@stop

@section('main')
    {{-- {{ dd($post['creator']->getMedia('avatars')) }} --}}
    <div class="layout_post" id="app">
        <header>
            <div class="page-header__banner">
                <a href="https://hh.ru/employer/1212374" target="_blank">
                    <div class="company_banner" style="background-image: url({{ asset('images/wallpaper/baku.jpg') }})"
                         alt="company_banner"></div>
                </a>
            </div>
            <div class="page-header page-header_small page-header_bordered" id="company_2198">
                <div class="page-header_wrapper">
                    <div class="media-obj media-obj_company">
                        <a href="/company/funcorp/" class="media-obj__image page-header__image">
                            <img src="{{ asset('images/profile/new_user/1.svg') }}" width="48" height="48"
                                 class="company-info__image-pic">
                        </a>
                        <div class="media-obj__body media-obj__body_page-header media-obj__body_page-header_branding">
                            <div class="page-header__info">
                                <div class="page-header__info-title">FunCorp</div>
                                <sup class="page-header__stats-value page-header__stats-value_branding"
                                     title="Рейтинг компании">399,64</sup>
                                <div class="page-header__info-desc">
                                    Разработка развлекательных сервисов
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-header__buttons">
                        <button type="button" class="page-header__button btn" data-id="2198" data-state="follow">
                            <span class="btn__value"><i class="icon feather icon-user-plus"></i> Abunə olun <span
                                        class="folowers">{{ \Numeric::number_format_short(123) }}</span></span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <div class="post-show">
            <div class="post_left">
                <div class="container">
                    <div id="post-content" class="post-content">
                        <div id="sidebar" class="stickyVote">
                            <div class="stickyHeader">
                                <i class="icon feather icon-chevron-right"></i>{{ $post['name'] }}
                            </div>
                            <div class="post-votes-sticky">
                                <vote :posts="{{ json_encode($post) }}" @auth :auth_check="true" @endauth ></vote>
                            </div>
                        </div>
                        <div class="post-content__item">
                            <div class="post-content__header">
                                <div class="post-title">
                                    <h1>{{ $post['name'] }}</h1>
                                </div>
                                <div class="post-header__right">
                                    <span class="post__time"><i class="icon feather icon-calendar"></i> {{ Carbon\Carbon::parse($post['created_at'])->diffForHumans() }} | {{ Carbon\Carbon::parse($post['created_at'])->format('H:i') }}</span>
                                </div>
                            </div>
                            <hubs-tags :data="{{ json_encode($hubs) }}"></hubs-tags>
                            <div class="post-content__body">
                                {!! $body !!}
                            </div>
                        </div>
                        <div id="content_footer" class="post__content-footer">
                        <span class="footer_item">
                            <i class="eye icon"></i> {{ $post['views']->count() }} Baxışların sayı
                        </span>
                            @auth
                                @if ($post->postIsFollowing(Auth::user()) != "folowing")
                                    <span class="star tooltip footer_item" aria-label="Seçilmişlərə əlavə et"
                                          data-balloon-pos="down">
                                    <i class="bookmark outline icon"></i> {{ $post->postFollowers->count() }} Seçilmiş
                                </span>
                                @elseif($post->postIsFollowing(Auth::user()) == "folowing")
                                    <span class="star tooltip footer_item" aria-label="Seçilmişlərdən cixartmag"
                                          data-balloon-pos="down">
                                    <i class="bookmark icon"></i> {{ $post->postFollowers->count() }} Seçilmiş
                                </span>
                                @endif
                            @endauth
                            @guest
                                <span class="star tooltip footer_item" aria-label="Seçilmişlərə əlavə et"
                                      data-balloon-pos="down">
                                <i class="bookmark outline icon"></i> {{ $post->postFollowers->count() }} Seçilmiş
                            </span>
                            @endguest
                            <span class="footer_item ui inline dropdown">
                            <i class="ellipsis horizontal icon"></i>
                            <div class="menu">
                                <div class="item"><i class="flag icon"></i> Şikayət et</div>
                            </div>
                        </span>
                        </div>
                    </div>
                    <div class="post-share">
                        <span class="post-share__title"><i class="icon feather icon-share"></i> Paylaş</span>
                        <ul class="post-share__buttons social-icons">
                            <li class="social-icons__item social-icons__item_post">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}"
                                   class="social-icons__item-link social-icons__item-link_normal social-icons__item-link_facebook"
                                   title="Опубликовать ссылку в Facebook"
                                   onclick="window.open(this.href, 'Опубликовать ссылку в Facebook', 'width=640,height=436,toolbar=0,status=0'); return false">
                                    <svg class="icon-svg" aria-hidden="true" aria-labelledby="title" version="1.1"
                                         role="img" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                                d="M14.889 8.608h-1.65c-.195 0-.413.257-.413.6v1.192h2.063v1.698h-2.063v5.102h-1.948v-5.102h-1.766v-1.698h1.766v-1c0-1.434.995-2.6 2.361-2.6h1.65v1.808z"></path>
                                    </svg>
                                </a>
                            </li>
                            <li class="social-icons__item social-icons__item_post">
                                <a href="https://vk.com/share.php?url={{ URL::current() }}"
                                   class="social-icons__item-link social-icons__item-link_normal social-icons__item-link_vkontakte"
                                   title="Опубликовать ссылку во ВКонтакте"
                                   onclick="window.open(this.href, 'Опубликовать ссылку во ВКонтакте', 'width=800,height=300,toolbar=0,status=0'); return false">
                                    <svg class="icon-svg" aria-hidden="true" aria-labelledby="title" version="1.1"
                                         role="img" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                                d="M16.066 11.93s1.62-2.286 1.782-3.037c.054-.268-.064-.418-.343-.418h-1.406c-.322 0-.44.139-.537.343 0 0-.76 1.619-1.685 2.64-.297.33-.448.429-.612.429-.132 0-.193-.11-.193-.408v-2.607c0-.365-.043-.472-.343-.472h-2.254c-.172 0-.279.1-.279.236 0 .343.526.421.526 1.352v1.921c0 .386-.022.537-.204.537-.483 0-1.631-1.663-2.274-3.552-.129-.386-.268-.494-.633-.494h-1.406c-.204 0-.354.139-.354.343 0 .375.44 2.114 2.167 4.442 1.159 1.566 2.683 2.414 4.056 2.414.838 0 1.041-.139 1.041-.494v-1.202c0-.301.118-.429.29-.429.193 0 .534.062 1.33.848.945.901 1.01 1.276 1.525 1.276h1.578c.161 0 .311-.075.311-.343 0-.354-.462-.987-1.17-1.738-.29-.386-.762-.805-.912-.998-.215-.226-.151-.354-.001-.59z"></path>
                                    </svg>
                                </a>
                            </li>
                            <li class="social-icons__item social-icons__item_post">
                                <a href="https://t.me/share/url?url={{ URL::current() }}&amp;title={{ $post['name'] }}"
                                   class="social-icons__item-link social-icons__item-link_normal social-icons__item-link_telegram"
                                   title="Поделиться ссылкой в Telegram"
                                   onclick="window.open(this.href, 'Поделиться ссылкой в Telegram', 'width=800,height=300,toolbar=0,status=0'); return false">
                                    <svg class="icon-svg" aria-hidden="true" aria-labelledby="title" version="1.1"
                                         role="img" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                                d="M17.17 7.621l-10.498 3.699c-.169.059-.206.205-.006.286l2.257.904 1.338.536 6.531-4.796s.189.057.125.126l-4.68 5.062-.27.299.356.192 2.962 1.594c.173.093.397.016.447-.199.058-.254 1.691-7.29 1.728-7.447.047-.204-.087-.328-.291-.256zm-6.922 8.637c0 .147.082.188.197.084l1.694-1.522-1.891-.978v2.416z"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="comments" class="post-comments">
                        <div class="comment-header">
                            <div class="head">Komentlər</div>
                            <div class="count">{{ $comments->count() }}</div>
                        </div>
                        @if ($comments)
                            @foreach($comments as $comment)
                                <div class="post-comment"
                                     @if($comment->parent_id != null) style="margin-left:40px;"
                                     @endif id="post_{{$comment->id}}">
                                    <img class="comment-avatar" src="" alt="">
                                    <div class="comment-body">
                                        <div class="flex">
                                            <a class="comment-author"
                                               href="{{ url('users/@' . $comment->author->username) }}">
                                                <span>{{ $comment->author->username }}</span>
                                            </a>
                                            <div class="comment-time">
                                                {{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                            </div>
                                            <div class="comment-date">
                                                {{ Carbon\Carbon::parse($comment->created_at)->locale('az')->isoformat('d MMMM Y H:mm') }}
                                            </div>
                                        </div>
                                        <div class="comment-text">{{ $comment->body }}</div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if(Auth::check())
                            <form method="post" action="{{ route('new-comment') }}">
                                @csrf
                                <div class="post-comment">
                                    <img class="comment-avatar" src="{{ asset('images/profile/deadpool.gif') }}" alt="">
                                    <div class="comment-body">
                                        <span class="comment-author">{{ Auth::user()->username }}</span>
                                        <p><small>Перед тем как написать хуйню, подумай,сука!</small></p>
                                        <p><textarea class="input" style="padding: 5px;" rows="2" cols="20000"
                                                     name="body" class="comment-text"></textarea></p>
                                        <input type="submit" class="btn btn-primary submit btn-sm" value="Yazmag"/>
                                    </div>
                                    <input type="hidden" name="post_id" value="{{ $post['id'] }}"/>
                                    {{-- <input type="hidden" name="parent_id" value="{{ $comment->id }}" /> --}}
                                </div>
                            </form>
                        @else
                            <blockquote class="blockquote">
                                Yalnız <a href="{{ route('register') }}">istifadəçilər</a> şərh yaza bilər. Xahiş edirik
                                <a href="{{ route('login') }}">daxil olun</a>.
                            </blockquote>
                        @endif
                    </div>
                </div>
            </div>

            <div id="main-content" class="content_right">
                <div id="default-block" class="block default-block_sidebar">
                    <div class="user-card">
                        <div class="card-header">
                            <div></div>
                            <div class="image-border"
                                 style="background-image: url(https://unsplash.imgix.net/45/ZLSw0SXxThSrkXRIiCdT_DSC_0345.jpg?q=75&w=1080&h=1080&fit=max&fm=jpg&auto=form)">
                                <img class="profile-image" src="{{ asset('images/profile/deadpool.gif') }}"
                                     alt="User avatar">
                            </div>
                        </div>
                        <div class="content">
                            <div class="header">
                                <a class="author_name"
                                   href="{{ url('users/@' . $post['creator']['username']) }}">{{ '@' . $post['creator']['username'] }}</a>
                                <span class="author">Müəllif</span>
                            </div>
                            <div class="media-obj__body media-obj__body_user-info">
                                <div>
                                    <div class="stacked-counter-karm__value">{{ $post['creator']['karma'] }}</div>
                                    <div class="stacked-counter__label">Karma</div>
                                </div>

                                <div>
                                    <div class="stacked-counter-rait__value">{{ $post['creator']['rating'] }}</div>
                                    <div class="stacked-counter__label">Reytinqi</div>
                                </div>
                            </div>
                            <div class="meta">
                                <p class="meta-text" style="color:black;">
                                    {{ $post['creator']['about'] }}
                                </p>
                                @auth
                                    @if(Auth::user()->id == $post['creator']['id'])
                                    @elseif(!$isFollowing)
                                        <a href="{{ route('user.follow', $post['creator']['id']) }}"
                                           onclick="event.preventDefault(); document.getElementById('follow').submit();"
                                           class="btn profile_user-connect">
                                            Abunə olun
                                        </a>
                                    @elseif($isFollowing)
                                        <a href="{{ route('user.follow', $post['creator']['id']) }}"
                                           onclick="event.preventDefault(); document.getElementById('unfollow').submit();"
                                           class="btn profile_user-connected">Abunəsiz</a>
                                    @endif
                                @endauth
                                @guest
                                    <a href="{{ route('user.follow', $post['creator']['id']) }}"
                                       onclick="event.preventDefault(); document.getElementById('folow').submit();"
                                       class="btn profile_user-connect">
                                        Abunə olmag
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        const stickybit = stickybits('.stickyVote');

        const stickyblock = stickybits('#default-block', {
            stickyBitStickyOffset: 10,
        });
    </script>
@endsection
