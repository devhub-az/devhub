@extends('layouts.layout')

@section('title')Məlumat @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@stop

@section('main')

    <div class="about__content">
        <section class="about__head">
            <div class="about__header_block">
                <h1 class="about__header"><span class="about__logo">DevHub</span> — yaradıcılıq üçün imkanlar</h1>
                <p>DevHub помогает Азербайджанским программистам без лишних трудностей делиться своими знаниями и
                    опытом.</p>
            </div>
        </section>
        <section class="about__body">
            <div class="about__info_block">
                <h2>Bilik və təcrübənizi məqalələrdə paylaşın</h2>
                <div class="tour_desc_right">
                    <div class="about__text">
                        <p>DevHub sayt cavab almaq üçün hər şeydir.</p>
                    </div>
                    <div class="tour_image_block_right">
                        <div class="post-content__item tour_image_right">
                            <header class="post__meta">
                                <div title="Paylaşmanın müəllifi" class="post__user-info user-info">
                                    <img alt="user avatar" class="user__avatar" src="/images/profile/user.jpg">
                                    <span class="user-info__nickname user-info__nickname_small">@jsidorova</span>
                                </div>
                                <span class="post__time">03 March, 13:31</span>
                                <span aria-label="Oxumaq vaxtı" data-balloon-pos="left" class="post__read-time">
                                    <span class="mdi mdi-clock-outline"></span> 4 dəqiqə
                                </span>
                            </header>
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
                            <div class="post-content__body">
                                <p>Danılmaz faktdır ki ölkədə hal hazırda paradoksal vəziyyət var. Şirkətlər proqramçı
                                    tapa bilmir, digər tərəfdən proqramçı ya da “proqramçı”-lar iş tapa bilmir. Hər iki
                                    tərəfə çox yaxın olduğum üçün var olan problemi son zamanlarda xüsusilə çox ciddi
                                    şəkildə hissedirəm. Şirkətlər çox təbii olaraq işlərinin yolunda getməsi üçün
                                    təcrübəli proqramçı tələb edirlər və yenə də çox təbii olaraq istədikləri
                                    kriteriyalara uyğun proqramçı tapa bilmirlər. Səbəbi isə çox bəsitdir. Biz
                                    Azərbaycanda yaşayırıq. Təhsilin sadəcə kağız üzərində var olduğu sistemin istehsalı
                                    olan kadrlardan şirkət tələblərini qarşılayabilməsini gözləmək xəyaldan başqa bir
                                    şey deyil. Bu mövzuda üç tərəf mövzcuddur…</p></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="about__info_block">
                <h2>Səs vermədə iştirak edin</h2>
                <div class="tour_desc_left">
                    <div class="tour_image_block_left">
                        <div class="post-content__item tour_image_left">
                            <header class="post__meta">
                                <div title="Paylaşmanın müəllifi" class="post__user-info user-info">
                                    <img alt="user avatar" class="user__avatar" src="/images/profile/user.jpg">
                                    <span class="user-info__nickname user-info__nickname_small">@jsidorova</span>
                                </div>
                                <span class="post__time">03 March, 13:31</span>
                                <span aria-label="Oxumaq vaxtı" data-balloon-pos="left" class="post__read-time">
                                    <span class="mdi mdi-clock-outline"></span> 4 dəqiqə
                                </span>
                            </header>
                            <div class="post-content__header">
                                <div class="post-title">
                                    <h3>Proqramlaşdırma sektoru niyə kadr problemi yaşayır?</h3>
                                </div>
                                <div aria-label="1:  ↑ 1 ↓ 0" data-balloon-pos="left" class="post-votes">
                                    <i class="mdi mdi-thumb-up-outline upvoted"></i>
                                    <span class="rating" style="color: var(--color-primary-main);"> 1</span>
                                    <i class="mdi mdi-thumb-down-outline"></i>
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
                                    şey deyil. Bu mövzuda üç tərəf mövzcuddur…</p></div>
                        </div>
                    </div>
                    <div class="about__text">
                        <p>İlk paylaşmanı yazın və DevHub-a dəstək olun</p>
                        <div class="good-answers">
                            <i class="mdi mdi-thumb-up-outline upvoted"></i>
                            <p>Yaxşı cavablar səslənir və <strong>yuxarılara yüksəlir</strong></p>
                            <p class="helper-text">The best answers show up first so that they are always easy to
                                find.</p>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(window).scroll(function () {

            /* Check the location of each desired element */
            $('.tour_image_right').each(function (i) {
                const bottom_of_object = $(this).offset().top + $(this).outerHeight();
                const bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it in */
                if (bottom_of_window > bottom_of_object) {

                    $(this).animate({'left': "3rem"}, 1500);

                }
            });

            $('.tour_image_left').each(function (i) {
                const bottom_of_object = $(this).offset().top + $(this).outerHeight();
                const bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it in */
                if (bottom_of_window > bottom_of_object) {

                    $(this).animate({'right': "3rem"}, 1500);

                }
            });
        });
    </script>
@endsection
