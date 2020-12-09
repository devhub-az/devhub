@extends('layouts.layout')

@section('title')Hablar @stop

@section('main')
    <div class="container w-full my-4 mx-auto ">
        <div class="grid grid-cols-1 md:grid-cols-main lg:grid-cols-main gap-1 md:gap-4 gap-5 pb-2">
            <div>
                <p class="text-5xl font-medium pb-4">Hablar</p>
                <p>
                    Hablar müəyyən mövzularda nəşrlərin yerləşdirildiyi bölmələrdir. Onlar yalnız saytdakı bütün
                    məlumatları rahat şəkildə qurulmasına deyil, həm də istifadəçi qidasının formalaşmasına kömək edir -
                    yalnız maraqlı olan ocaqlara yazılmaq.
                </p>
            </div>
            <div class="m-auto">
                <a href="#" class="button transition delay-100">
                    <span>
                        <i class="mdi mdi-tag-plus-outline"></i> Hab təklif etmək
                    </span>
                </a>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-main lg:grid-cols-main gap-2 md:gap-4 gap-5">
            <div class="content_left" id="app">
                {{--                <div class="ui category search form-hub__search">--}}
                {{--                    <div class="ui icon input header_search">--}}
                {{--                        <label>--}}
                {{--                            <input class="prompt search" type="text" placeholder="Hub axtar">--}}
                {{--                        </label>--}}
                {{--                        <i class="icon feather icon-search"></i>--}}
                {{--                    </div>--}}
                {{--                    <div class="results"></div>--}}
                {{--                </div>--}}
                <hubs-list
                    fetch-url="{{ route('hubs.index') }}"
                    locale="{{ App::getLocale() }}"
                    @auth :auth_check="true" @endauth
                    :columns="[
                            ['name', 'posts_count', 'followers_count', 'rating'],
                            ['Ad', 'Paylaşım', 'IZLƏYƏNLƏR', 'Rating']
                            ]"
                ></hubs-list>
            </div>
            {{-- Right --}}
            <div class="content_right">
                <div id="default-block" class="mb-5 bg-white rounded border">
                    <div class="px-5 h-10 border-b items-center flex">
                        <p class="m-0 text-sm items-center">Ən sevimli</p>
                    </div>

                    <div class="overflow-hidden bg-white text-black px-5 py-2">
                        <ul>
                            @foreach ($top_hubs as $hub)
                                <a href="/hubs/{{ $hub['id'] ?? '' }}">
                                    <li class="grid grid-cols-list gap-3 mb-2">
                                        <img src="{{ strtolower($hub['logo']) ?? '/images/empty/code.png' }}"
                                             alt="hub image">
                                        <div>
                                            <p class="text-lg font-semibold">
                                                {{ $hub['name'] }}
                                            </p>
                                            <span class="text-xs">
                                                <i class="icon feather icon-star"></i>
                                                Reyting {{ $hub['rating'] ?? '' }}
                                            </span>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="default-block" class="mb-5 bg-white rounded border">
                    <div class="px-5 h-10 border-b items-center flex">
                        <p class="m-0 text-sm items-center">Ən izləninən</p>
                    </div>

                    <div class="overflow-hidden bg-white text-black px-5 py-2">
                        <ul>
                            @foreach ($top_followed_hubs as $hub)
                                <a href="/hubs/{{ $hub['id'] ?? '' }}">
                                    <li class="grid grid-cols-list gap-3 mb-2">
                                        <img src="{{ strtolower($hub['logo']) ?? '/images/empty/code.png' }}"
                                             alt="hub image">
                                        <div>
                                            <p class="text-lg font-semibold">
                                                {{ $hub['name'] }}
                                            </p>
                                            <span class="text-xs">
                                                <i class="icon feather icon-users"></i>
                                                İzləyicilər {{ $hub['rating'] ?? '' }}
                                            </span>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/hubs.js') }}"></script>
@endpush

@push('styles')
    <link rel="preload" href="{{ mix('js/hubs.js') }}" as="script">
@endpush
