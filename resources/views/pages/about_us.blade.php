@extends('layouts.layout')

@section('title')Məlumat @stop

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@stop

@section('main')

    <div class="about__content">
        <section class="about__head">
            <div class="about__header_block">
                <h1 class="about__header"><span class="about__logo">DevHub</span> — yaradıcılıq üçün imkanlar</h1>
                <p>DevHub azərbaycanlı proqramçılara bilik və təcrübələrini çətinlik olmadan bölüşməyə kömək edir.</p>
            </div>
        </section>
        <section class="about__body">
            <div class="about__info_block">
                <div class="tour_desc_right">
                    <div class="about-text">
                        <h3 class="title">Daxili bilikləri kəşf edin</h3>
                        <p class="text">Məlumat tapın və maraqlandığınız mövzuları izləmək üçün hablardan istifadə
                            edin.</p>
                        <a href="/teams/integrations"
                           class="btn btn-primary">Hab araşdırın</a>
                    </div>
                    <div class="tour_image_block_right">
                        <div class="post-content__item tour_image_right">
                            <div class="post__meta">
                                <div title="Paylaşmanın müəllifi" class="post__user-info user-info">
                                    <img alt="user avatar" class="user__avatar" src="/images/profile/user.jpg">
                                    <span class="user-info__nickname user-info__nickname_small">@jsidorova</span>
                                </div>
                                <span class="post__time">03 March, 13:31</span>
                                <span aria-label="Oxumaq vaxtı" data-balloon-pos="left" class="post__read-time">
                                    <span class="mdi mdi-clock-outline"></span> 4 dəqiqə
                                </span>
                            </div>
                            <div class="post-content__header sm">
                                <div class="post-title">
                                    <h3>Proqramlaşdırma sektoru niyə kadr problemi yaşayır?</h3>
                                </div>
                                <div aria-label="1:  ↑ 1 ↓ 0" data-balloon-pos="left" class="post-votes"><span
                                            class="mdi mdi-thumb-up-outline"></span>
                                    <span class="rating" style="color: var(--color-primary-main);"> 1
                                    </span> <span class="mdi mdi-thumb-down-outline"></span>
                                </div>
                            </div>
                            <div class="post__hubs">
                                <div class="hub popup-hub">
                                    Data visualization
                                </div>
                                <div class="hub popup-hub">
                                    CSS
                                </div>
                                <div class="hub popup-hub">
                                    PHP
                                </div>
                                <div class="hub popup-hub">
                                    Docker
                                </div>
                            </div>
                            <div class="post-content__body">
                                <p>Danılmaz faktdır ki ölkədə hal hazırda paradoksal vəziyyət var. Şirkətlər proqramçı
                                    tapa bilmir, digər tərəfdən proqramçı ya da “proqramçı”-lar iş tapa bilmir. Hər iki
                                    tərəfə çox yaxın olduğum üçün var olan problemi son zamanlarda xüsusilə çox ciddi
                                    şəkildə hissedirəm. Şirkətlər çox təbii olaraq işlərinin yolunda getməsi üçün
                                    təcrübəli proqramçı tələb edirlər və yenə də çox təbii olaraq istədikləri
                                    kriteriyalara uyğun proqramçı tapa bilmirlər. Səbəbi isə çox bəsitdir. Biz
                                    Azərbaycanda yaşayırıq. Təhsilin sadəcə kağız üzərində var olduğu sistemin istehsalı
                                    olan kadrlardan şirkət tələblərini qarşılayabilməsini gözləmək xəyaldan başqa bir
                                    şey deyil. Bu mövzuda üç tərəf mövzcuddur…
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about__info_block">
                <div class="tour_desc_left">
                    <div class="tour_image_block_left">
                        <div class="post-content__item tour_image_left">
                            <div class="post__meta">
                                <div title="Paylaşmanın müəllifi" class="post__user-info user-info">
                                    <img alt="user avatar" class="user__avatar" src="/images/profile/user.jpg">
                                    <span class="user-info__nickname user-info__nickname_small">@jsidorova</span>
                                </div>
                                <span class="post__time">03 March, 13:31</span>
                                <span aria-label="Oxumaq vaxtı" data-balloon-pos="left" class="post__read-time">
                                    <span class="mdi mdi-clock-outline"></span> 4 dəqiqə
                                </span>
                            </div>
                            <div class="post-content__header">
                                <div class="post-title">
                                    <h3>Proqramlaşdırma sektoru niyə kadr problemi yaşayır?</h3>
                                </div>
                                <div aria-label="1:  ↑ 1 ↓ 0" data-balloon-pos="left" class="post-votes">
                                    <i class="mdi mdi-thumb-up-outline upvoted"></i>
                                    <span class="rating" style="color: var(--color-primary-main);"> 24</span>
                                    <i class="mdi mdi-thumb-down-outline"></i>
                                </div>
                            </div>
                            <div class="post__hubs">
                                <div class="hub popup-hub">
                                    Data visualization
                                </div>
                                <div class="hub popup-hub">
                                    CSS
                                </div>
                                <div class="hub popup-hub">
                                    PHP
                                </div>
                                <div class="hub popup-hub">
                                    Docker
                                </div>
                            </div>
                            <div class="post-content__body">
                                <p>Danılmaz faktdır ki ölkədə hal hazırda paradoksal vəziyyət var. Şirkətlər proqramçı
                                    tapa bilmir, digər tərəfdən proqramçı ya da “proqramçı”-lar iş tapa bilmir. Hər iki
                                    tərəfə çox yaxın olduğum üçün var olan problemi son zamanlarda xüsusilə çox ciddi
                                    şəkildə hissedirəm. Şirkətlər çox təbii olaraq işlərinin yolunda getməsi üçün
                                    təcrübəli proqramçı tələb edirlər və yenə də çox təbii olaraq istədikləri
                                    kriteriyalara uyğun proqramçı tapa bilmirlər. Səbəbi isə çox bəsitdir. Biz
                                    Azərbaycanda yaşayırıq. Təhsilin sadəcə kağız üzərində var olduğu sistemin istehsalı
                                    olan kadrlardan şirkət tələblərini qarşılayabilməsini gözləmək xəyaldan başqa bir
                                    şey deyil. Bu mövzuda üç tərəf mövzcuddur…
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="about-text">
                        <h3 class="title">Məlumatı aktuallaşdırın</h3>
                        <p class="text">Zamanla daha çox kontekst əlavə edin və yeni məzmun göstərmək üçün səsvermədən
                            istifadə edin.</p>
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
                    <a href="{{ route('create_post') }}"
                       class="btn btn-primary">
                        Töhfə vermək
                    </a>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(window).scroll(function () {
            console.log("scrolling");
            /* Check the location of each desired element */
            $('.tour_image_right').each(function (i) {
                const bottom_of_object = $(this).offset().top + $(this).outerHeight();
                const bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it in */
                if (bottom_of_window > bottom_of_object) {

                    $(this).animate({'left': "7rem"}, 1500);

                }
            });

            $('.tour_image_left').each(function (i) {
                const bottom_of_object = $(this).offset().top + $(this).outerHeight();
                const bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it in */
                if (bottom_of_window > bottom_of_object) {

                    $(this).animate({'right': "7rem"}, 1500);

                }
            });
        });
    </script>
@endsection
