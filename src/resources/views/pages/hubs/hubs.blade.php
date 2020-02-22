@extends('front.layout')

@section('title')Hablar @stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/popup.min.css" />
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@stop

@section('main')
    <div class="layout_body">
        <div class="hubs-page__header">
            <div class="hubs-header__title">
                <h1>Hablar</h1>
                <h4>
                    Hablar müəyyən mövzularda nəşrlərin yerləşdirildiyi bölmələrdir. Onlar yalnız saytdakı bütün
                    məlumatları rahat şəkildə qurulmasına deyil, həm də istifadəçi qidasının formalaşmasına kömək edir -
                    yalnız maraqlı olan ocaqlara yazılmaq.
                </h4>
            </div>
            <div class="hubs-page__right-side">
                <a href="#" class="btn btn-primary btn-a"><span><i class="mdi mdi-tag-plus-outline"></i> Hab təklif etmək</span></a>
            </div>
        </div>
        <div class="layout_content">
            <div class="content_left" id="app">
                <div class="ui category search form-hub__search">
                    <div class="ui icon input header_search">
                        <label>
                            <input class="prompt search" type="text" placeholder="Hub axtar">
                        </label>
                        <i class="icon feather icon-search"></i>
                    </div>
                    <div class="results"></div>
                </div>
                <hubs-list
                    fetch-url="{{ route('hubs-list-api') }}"
                    locale="{{ App::getLocale() }}"
                    @auth :auth_check="true" @endauth
                    :columns="['name', 'posts_count', 'rating']"
                ></hubs-list>
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
                                <a href="/hubs/{{ $hub['id'] ?? '' }}">
                                    <li style="display: grid;grid-template-columns: 23% 75%;gap: 3%;margin-bottom: 12px;">
                                        <img class="list-hubs__hub-image-block"
                                             src="{{ strtolower($hub['logo']) ?? '/images/empty/code.png' }}" alt="">
                                        <div class="list-hubs__obj-body">
                                            <div class="block-hubs__title-link">
                                                {{ $hub['name'] }}
                                            </div>
                                            <div class="list-hubs__desc">
                                            <span
                                                style="font-size: 11px; color: #848d95;">{{ $hub->description[\App::getLocale()] }}</span>
                                                <br>
                                                <span style="font-size: 11px; color: #3b4045;">
                                                <i class="icon feather icon-star"></i> Reyting {{ $hub['rating'] ?? '' }}
                                            </span>
                                            </div>
                                        </div>
                                    </li>
                                </a>
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
                                <li style="display: grid;grid-template-columns: 23% 75%;gap: 3%;margin-bottom: 12px;">
                                    <img class="list-hubs__hub-image-block"
                                         src="{{ strtolower($hub['logo']) ?? '/images/empty/code.png' }}" alt="">
                                    <div class="list-hubs__obj-body">
                                        <div class="block-hubs__title-link">
                                            <a href="/hubs/{{ $hub['id'] ?? '' }}">{{ $hub['name'] ?? '' }}</a></div>
                                        <div class="list-hubs__desc">
                                            <span
                                                style="font-size: 11px; color: #848d95;">{{ $hub->description[\App::getLocale()] }}</span>
                                            <br>
                                            <span style="font-size: 11px; color: #3b4045;">
                                                <i class="icon feather icon-users"></i> İzləyicilər {{ $hub['hub_followers_count'] ?? '' }}
                                            </span>
                                        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.compatibility.js"></script>
    <script src="{{ asset('js/search.min.js') }}"></script>
    <script>
        function axiosHubs() {
            return axios.get('/api/hubs/all').then(response => {
                return response.data;
            });
        }

        $('.ui.search').settings.api = {
            'hubs' : '/api/hubs/all'
        };

        $(document).ready(function() {
                $('.ui.search')
                    .search({
                        type: 'category',
                        apiSettings:{
                            action: 'hubs'
                        },
                        searchDelay: 500,
                        fields: {
                            image: 'logo',
                            title: 'name',
                        },
                        searchFields: [
                            'name'
                        ],
                        fullTextSearch: false,
                        onSelect(result) {
                            window.location.href = '/hubs/' + result.id;
                        },
                        templates: {
                            message: function message() {
                                return '<div class="message empty"><div class="header">Hub tapilmadi</div><div class="description">Axtarışınız uğurlu alınmadı</div></div>';
                            },
                        }
                    });
        });

    </script>
@endsection
