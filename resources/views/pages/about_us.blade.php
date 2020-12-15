@extends('layouts.layout')

@section('title')Məlumat @stop

@section('main')

    <div class="about__content">
        <div class="relative w-full h-96 bg-cover bg-center xs:bg-left"
             style="background-image: url({{ asset('images/about/about_main.jpg') }})">
            <div class="absolute xs:bg-black w-full h-96 xs:opacity-25"></div>
            <div class="relative flex flex-col text-center w-full mb-12 text-white text-center py-6">
                <div class="w-1/3 xs:w-full px-2 mx-auto">
                    <p class="text-4xl"><span class="font-medium">DevHub</span>-a xoş gəlmisiniz</p>
                    <img src="{{ asset('images/DevHub_Compact_Logo.svg') }}" alt="Logo image" width="158"
                         class="mx-auto py-8">
                    <p class="leading-6 text-shadow"><span class="font-medium">DevHub</span>-ın əsas vəzifəsi Azərbaycan
                        proqramçılarının təcrübələri və uğurlarını
                        digər proqramçılar ilə bölüşməsinə kömək etməkdir.</p>
                </div>
            </div>
        </div>
        <div class="animate__fadeIn">asd</div>
        <section class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto">
            <div class="py-6 border-b">
                <p class="text-3xl text-center mb-6">Daxili bilikləri kəşf edin</p>
                <div class="grid grid-cols-2">
                    <div class="m-auto text-center w-2/3">
                        <p class="mb-4">Məlumat tapın və maraqlandığınız mövzuları izləmək üçün hablardan istifadə
                            edin.</p>
                        <a href="/teams/integrations"
                           class="button w-max mx-auto">Hab araşdırın</a>
                    </div>
                    <div class="w-full mb-3 rounded bg-white border tour_image_left">
                        <div class="px-3.5">
                            <div class="flex align-middle pt-3">
                                <a href="/authors/@vladimir.blinova"
                                   title="Paylaşmanın müəllifi"
                                   class="inline-flex no-underline">
                                    <img height="32"
                                         width="32"
                                         alt="user avatar"
                                         src="/upload/avatars/factory/image-10.png"
                                         class="w-6 h-6 flex-none image-fit rounded lazyload">
                                    <p class="text-sm pl-2 m-auto">
                                        @vladimir.blinova</p></a>
                                <p class="text-xs my-auto mr-auto pl-2">
                                    12 December, 6:05
                                </p>
                                <p class="text-sm my-auto xs:hidden md:hidden sm:hidden">
                                    <i class="mdi mdi-clock-outline"></i>
                                    1 dəqiqə
                                </p>
                            </div>
                            <div class="grid grid-flow-col py-2">
                                <a href="/article/sunt-illum-sunt-magnam-nihil-explicabo-ut-nemo-et-cumque-incidunt"
                                   class="my-auto">
                                    <p class="text-2xl xs:text-xl font-medium">Sunt illum sunt magnam
                                        nihil explicabo ut nemo et cumque incidunt.</p>
                                </a>
                                <div aria-label="0:  ↑ 0 ↓ 0" data-balloon-pos="left"
                                     class="flex gap-2 ml-auto pl-2 text-2xl xs:text-xl mb-auto"><i
                                        class="mdi mdi-thumb-up-outline hover:text-green-600"></i>
                                    <p style="color: inherit;">
                                        0
                                    </p>
                                    <i class="mdi mdi-thumb-down-outline hover:text-red-600"></i></div>
                            </div>
                            <div class="markdown my-2 xs:hidden md:hidden sm:hidden">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet, consectetur
                                    ducimus est facere fugiat fugit ipsum nihil nobis optio praesentium quibusdam sit
                                    soluta. Dolorem ducimus ipsa omnis optio perferendis! Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit. Atque cumque dolorem doloribus dolorum error,
                                    explicabo itaque nisi qui sequi voluptatem. Ab aliquam, dolor est fugit laboriosam
                                    nam nostrum temporibus voluptatem? Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Placeat quidem quis reprehenderit. Ab aliquam aut commodi dolor,
                                    dolore eligendi eum fugiat harum in nulla numquam, pariatur, quod sit tempora
                                    tempore?
                                </p>
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-main border-t text-sm bg-gray-100 mt-2 px-3.5 py-2">
                            <div class="flex xs:justify-between items-center md:justify-between sm:justify-between">
                                <div class="flex items-cente"><i class="mdi mdi-eye-outline"></i>
                                    <p class="ml-1">2</p>
                                    <p class="ml-1 xs:hidden sm:hidden">Baxışların sayı</p></div>
                                <div class="pl-2"><a href="/post/0017f39a-85fe-30ad-9ba0-143c6f2ce974#comments"
                                                     class="flex items-center"><i
                                            class="mdi mdi-comment-text-multiple-outline"></i>
                                        <p class="ml-1">X</p>
                                        <p class="ml-1 xs:hidden sm:hidden">Şerh</p></a></div>
                                <span data-v-c9c04554="" class="pl-2"><span data-v-c9c04554=""
                                                                            aria-label="Seçilmişlərə əlavə et"
                                                                            data-balloon-pos="down"
                                                                            class="star tooltip footer_item"><i
                                            data-v-c9c04554="" class="mdi mdi-bookmark-plus"></i>
                                        <span data-v-c9c04554="" class="xs:hidden">Seçilmiş</span></span> <!---->
                                    <!----></span>
                                <div class="pl-2 flex items-center cursor-pointer"><i class="mdi mdi-share"></i>
                                    <p class="ml-1 xs:hidden sm:hidden">Paylaş</p></div>
                            </div>
                            <div aria-label="0 səs: 0 plus 0 minus" data-balloon-pos="up"
                                 class="my-auto h-1 balloon xs:hidden md:hidden sm:hidden">
                                <div class="my-auto bg-gray-300 w-full rounded h-1 relative default">
                                    <div class="absolute h-1 bg-blue rounded" style="width: 0%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-6 border-b">
                <p class="text-3xl text-center mb-6">Daxili bilikləri kəşf edin</p>
                <div class="grid grid-cols-2">
                    <div class="w-full mb-3 rounded bg-white border">
                        <div class="px-3.5">
                            <div class="flex align-middle pt-3">
                                <a href="/authors/@vladimir.blinova"
                                   title="Paylaşmanın müəllifi"
                                   class="inline-flex no-underline">
                                    <img height="32"
                                         width="32"
                                         alt="user avatar"
                                         src="/upload/avatars/factory/image-10.png"
                                         class="w-6 h-6 flex-none image-fit rounded lazyload">
                                    <p class="text-sm pl-2 m-auto">
                                        @vladimir.blinova</p></a>
                                <p class="text-xs my-auto mr-auto pl-2">
                                    12 December, 6:05
                                </p>
                                <p class="text-sm my-auto xs:hidden md:hidden sm:hidden">
                                    <i class="mdi mdi-clock-outline"></i>
                                    1 dəqiqə
                                </p>
                            </div>
                            <div class="grid grid-flow-col py-2">
                                <a href="/article/sunt-illum-sunt-magnam-nihil-explicabo-ut-nemo-et-cumque-incidunt"
                                   class="my-auto">
                                    <p class="text-2xl xs:text-xl font-medium">Sunt illum sunt magnam
                                        nihil explicabo ut nemo et cumque incidunt.</p>
                                </a>
                                <div aria-label="0:  ↑ 0 ↓ 0" data-balloon-pos="left"
                                     class="flex gap-2 ml-auto pl-2 text-2xl xs:text-xl mb-auto"><i
                                        class="mdi mdi-thumb-up-outline hover:text-green-600"></i>
                                    <p style="color: inherit;">
                                        0
                                    </p>
                                    <i class="mdi mdi-thumb-down-outline hover:text-red-600"></i></div>
                            </div>
                            <div class="markdown my-2 xs:hidden md:hidden sm:hidden">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet, consectetur
                                    ducimus est facere fugiat fugit ipsum nihil nobis optio praesentium quibusdam sit
                                    soluta. Dolorem ducimus ipsa omnis optio perferendis! Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit. Atque cumque dolorem doloribus dolorum error,
                                    explicabo itaque nisi qui sequi voluptatem. Ab aliquam, dolor est fugit laboriosam
                                    nam nostrum temporibus voluptatem? Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Placeat quidem quis reprehenderit. Ab aliquam aut commodi dolor,
                                    dolore eligendi eum fugiat harum in nulla numquam, pariatur, quod sit tempora
                                    tempore?
                                </p>
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-main border-t text-sm bg-gray-100 mt-2 px-3.5 py-2">
                            <div class="flex xs:justify-between items-center md:justify-between sm:justify-between">
                                <div class="flex items-cente"><i class="mdi mdi-eye-outline"></i>
                                    <p class="ml-1">2</p>
                                    <p class="ml-1 xs:hidden sm:hidden">Baxışların sayı</p></div>
                                <div class="pl-2"><a href="/post/0017f39a-85fe-30ad-9ba0-143c6f2ce974#comments"
                                                     class="flex items-center"><i
                                            class="mdi mdi-comment-text-multiple-outline"></i>
                                        <p class="ml-1">X</p>
                                        <p class="ml-1 xs:hidden sm:hidden">Şerh</p></a></div>
                                <span data-v-c9c04554="" class="pl-2"><span data-v-c9c04554=""
                                                                            aria-label="Seçilmişlərə əlavə et"
                                                                            data-balloon-pos="down"
                                                                            class="star tooltip footer_item"><i
                                            data-v-c9c04554="" class="mdi mdi-bookmark-plus"></i>
                                        <span data-v-c9c04554="" class="xs:hidden">Seçilmiş</span></span> <!---->
                                    <!----></span>
                                <div class="pl-2 flex items-center cursor-pointer"><i class="mdi mdi-share"></i>
                                    <p class="ml-1 xs:hidden sm:hidden">Paylaş</p></div>
                            </div>
                            <div aria-label="0 səs: 0 plus 0 minus" data-balloon-pos="up"
                                 class="my-auto h-1 balloon xs:hidden md:hidden sm:hidden">
                                <div class="my-auto bg-gray-300 w-full rounded h-1 relative default">
                                    <div class="absolute h-1 bg-blue rounded" style="width: 0%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-auto text-center w-2/3">
                        <p class="mb-4">Məlumat tapın və maraqlandığınız mövzuları izləmək üçün hablardan istifadə
                            edin.</p>
                        <a href="/teams/integrations"
                           class="button w-max mx-auto">Hab araşdırın</a>
                    </div>
                </div>
            </div>

            <div class="about__info_block">
                <div class="tour_bottom">
                    <h2>
                        Uğur və təcrübələrinizi bölüşün
                    </h2>
                    <p class="tour_bottom_text">
                        Biz Azərbaycanda İT sənayesinin inkişafına kömək edirik. İnkişafa töhfə verin və təcrübə
                        mübadiləsi edin.
                    </p>
                    <a href="{{ route('create_article') }}"
                       class="btn btn-primary">
                        Töhfə vermək
                    </a>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('styles')
    @parent
    <link rel="stylesheet" type="text/css" property="stylesheet" href="{{ asset('css/animate.min.css') }}">
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $(window).scroll(function () {
            console.log("scrolling");
            /* Check the location of each desired element */
            $('.tour_image_right').each(function (i) {
                const bottom_of_object = $(this).offset().top + $(this).outerHeight();
                const bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it in */
                if (bottom_of_window > bottom_of_object) {

                    $(this).addClass('fadeInRight');

                }
            });

            $('.tour_image_left').each(function (i) {
                const bottom_of_object = $(this).offset().top + $(this).outerHeight();
                const bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it in */
                if (bottom_of_window > bottom_of_object) {

                    $(this).addClass('fadeInLeft');

                }
            });
        });
    </script>
@endpush


{{--<div class="about__info_block">--}}
{{--    <div class="tour_desc_left">--}}
{{--        <div class="tour_image_block_left">--}}
{{--            <div class="post-content__item tour_image_left">--}}
{{--                <div class="post__meta">--}}
{{--                    <div title="Paylaşmanın müəllifi" class="post__user-info user-info">--}}
{{--                        <img alt="user avatar" class="user__avatar" src="/images/profile/user.jpg">--}}
{{--                        <span class="user-info__nickname user-info__nickname_small">@jsidorova</span>--}}
{{--                    </div>--}}
{{--                    <span class="post__time">03 March, 13:31</span>--}}
{{--                    <span aria-label="Oxumaq vaxtı" data-balloon-pos="left" class="post__read-time">--}}
{{--                        <span class="mdi mdi-clock-outline"></span> 4 dəqiqə--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--                <div class="post-content__header">--}}
{{--                    <div class="post-title">--}}
{{--                        <h3>Proqramlaşdırma sektoru niyə kadr problemi yaşayır?</h3>--}}
{{--                    </div>--}}
{{--                    <div aria-label="1:  ↑ 1 ↓ 0" data-balloon-pos="left" class="post-votes">--}}
{{--                        <i class="mdi mdi-thumb-up-outline upvoted"></i>--}}
{{--                        <span class="rating" style="color: var(--color-primary-main);"> 24</span>--}}
{{--                        <i class="mdi mdi-thumb-down-outline"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="post__hubs">--}}
{{--                    <div class="hub popup-hub">--}}
{{--                        Data visualization--}}
{{--                    </div>--}}
{{--                    <div class="hub popup-hub">--}}
{{--                        CSS--}}
{{--                    </div>--}}
{{--                    <div class="hub popup-hub">--}}
{{--                        PHP--}}
{{--                    </div>--}}
{{--                    <div class="hub popup-hub">--}}
{{--                        Docker--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="post-content__body">--}}
{{--                    <p>Danılmaz faktdır ki ölkədə hal hazırda paradoksal vəziyyət var. Şirkətlər proqramçı--}}
{{--                        tapa bilmir, digər tərəfdən proqramçı ya da “proqramçı”-lar iş tapa bilmir. Hər iki--}}
{{--                        tərəfə çox yaxın olduğum üçün var olan problemi son zamanlarda xüsusilə çox ciddi--}}
{{--                        şəkildə hissedirəm. Şirkətlər çox təbii olaraq işlərinin yolunda getməsi üçün--}}
{{--                        təcrübəli proqramçı tələb edirlər və yenə də çox təbii olaraq istədikləri--}}
{{--                        kriteriyalara uyğun proqramçı tapa bilmirlər. Səbəbi isə çox bəsitdir. Biz--}}
{{--                        Azərbaycanda yaşayırıq. Təhsilin sadəcə kağız üzərində var olduğu sistemin istehsalı--}}
{{--                        olan kadrlardan şirkət tələblərini qarşılayabilməsini gözləmək xəyaldan başqa bir--}}
{{--                        şey deyil. Bu mövzuda üç tərəf mövzcuddur…--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="about-text">--}}
{{--            <h3 class="title">Məlumatı aktuallaşdırın</h3>--}}
{{--            <p class="text">Zamanla daha çox kontekst əlavə edin və yeni məzmun göstərmək üçün səsvermədən--}}
{{--                istifadə edin.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
