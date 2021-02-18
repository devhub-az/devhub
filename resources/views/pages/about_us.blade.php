@extends('layouts.layout')

@section('title')Məlumat @stop

@section('main')
    <div class="about__content">
        <div class="relative w-full h-96 bg-cover bg-center xs:bg-left"
             style="background-image: url({{ asset('images/about/about_main.jpg') }})">
            <div class="absolute xs:bg-black w-full h-96 xs:opacity-25"></div>
            <div class="relative flex flex-col text-center w-full mb-12 text-white text-center py-6">
                <div class="w-1/3 md:w-full sm:w-full xs:w-full px-2 mx-auto">
                    <p class="text-4xl"><span class="font-medium">DevHub</span>-a xoş gəlmisiniz</p>
                    <img src="{{ asset('images/DevHub_Compact_Logo.svg') }}" alt="Logo image" width="158"
                         class="mx-auto py-8 xs:w-3/12">
                    <p class="leading-6 text-shadow">
                        <span class="font-medium">DevHub</span>-ın əsas vəzifəsi Azərbaycan
                        proqramçılarının təcrübələri və uğurlarını
                        digər proqramçılar ilə bölüşməsinə kömək etməkdir.
                    </p>
                </div>
            </div>
        </div>
        <section class="lg:container xl:container my-20 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto">
            <div class="flex">
                <div class="w-1/2">
                    <h2 class="mb-6 font-sans text-3xl font-medium leading-none tracking-tight text-gray-900 sm:text-4xl mx-auto dark:text-gray-300">
                        Mən necə müəllif ola bilərəm?
                    </h2>
                    <p class="leading-relaxed font-light dark:text-gray-400">
                        На Девхабе интересуются IT и всеми сторонами современной жизни: программированием, технологиями,
                        дизайном, наукой, образованием, играми, карьерой, здоровьем. Не обязательно писать хардкорно, но
                        важно, чтобы была польза. Если у вас уже есть крутой материал на другой площадке, запостите его
                        и
                        здесь, чтобы сообщество Девхаба тоже его оценило.
                    </p>
                </div>
                <div class="w-1/2">
                    <img src="{{ asset('images/about/pro.svg') }}" alt="Post" class="w-2/3 ml-auto">
                </div>
            </div>
        </section>
        <section class="lg:container xl:container my-32 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto">
            <div class="flex">
                <div class="w-1/2">
                    <img src="{{ asset('images/about/post.svg') }}" alt="Post" class="w-2/3 mr-auto">
                </div>
                <div class="w-1/2">
                    <h2 class="mb-6 font-sans text-3xl font-medium leading-none tracking-tight text-gray-900 sm:text-4xl mx-auto dark:text-gray-300">
                        Niyə paylaşma yazmaq faydalıdı?
                    </h2>
                    <ul class="list-decimal space-y-2 ml-5 font-light dark:text-gray-400">
                        <li>
                            <p class="leading-relaxed dark:text-gray-400">
                                Написать пост — значит как следует разложить всё по полочкам, обобщить опыт и
                                поделиться им с другими. Приносить пользу чертовски приятно, попробуйте.
                            </p>
                        </li>
                        <li>
                            <p class="leading-relaxed dark:text-gray-400">
                                Никогда не угадаешь, кто прочитает ваш пост. Часто это те, кто разбирается в
                                вопросе
                                на голову лучше вас. Фидбэк от таких людей — возможно, самое ценное, что вы
                                приобретете на Девхабе.
                            </p>
                        </li>
                        <li>
                            <p class="leading-relaxed dark:text-gray-400">
                                Ваши публикации — это ваша репутация. Они лучше резюме расскажут, кто вы, чем
                                занимаетесь и в чем разбираетесь.
                            </p>
                        </li>
                        <li>
                            <p class="leading-relaxed dark:text-gray-400">
                                За первый крутой пост вы получите полноправный аккаунт и плюс в карму.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="lg:container xl:container my-20 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto">
            <h2 class="mb-6 font-sans text-center text-3xl mb-4 font-medium leading-none tracking-tight dark:text-gray-300 sm:text-4xl mx-auto">
                Hansı formatı seçim?
            </h2>
            <about-example id="app"></about-example>
            <div class="flex text-gray-700 space-x-2">
                <div class="space-y-4">
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">• Новости</p>
                        <p class="text-sm dark:text-gray-400">Первыми узнали о сбое в Сети? Увидели новый продукт раньше
                            всех?
                            Прочитали
                            свежий законопроект? Поделитесь с остальными.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">• Кейсы</p>
                        <p class="text-sm dark:text-gray-400">Организовали умный дом за 10к рублей? Переехали в Новую
                            Зеландию
                            писать код по распознаванию киви? Пишите пост, это же очень интересно.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">• Туториалы</p>
                        <p class="text-sm dark:text-gray-400">Справились с непростой задачей? Расскажите по пунктам, как
                            ее
                            решить — читатели будут благодарны.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">• Ретроспективы</p>
                        <p class="text-sm dark:text-gray-400">Помните в подробностях, как зарождались вещи, к которым
                            уже все
                            привыкли? Кайф! Это то, что приятно почитать долгими зимними вечерами!</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">• Обзоры</p>
                        <p class="text-sm dark:text-gray-400">Вы перепробовали кучу моноколес, стриминговых сервисов или
                            сред
                            разработки? Поделитесь, что там к чему, на что лучше обратить внимание.</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">• Мнения</p>
                        <p class="text-sm dark:text-gray-400">У вас особый взгляд на острый вопрос? Хотите это обсудить?
                            Напишите, что думаете, и готовьтесь провести вечер в комментариях.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">• Справочные</p>
                        <p class="text-sm dark:text-gray-400">Вы глубоко изучили сложную тему? Готовы рассказать на
                            пальцах,
                            как все устроено? Дерзайте!</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">• Интервью</p>
                        <p class="text-sm dark:text-gray-400">Есть доступ к человеку с необычным опытом? Срочно берите
                            его в
                            охапку и задавайте вопросы. А что он ответил, потом расскажите Хабру.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">• Дайджесты</p>
                        <p class="text-sm dark:text-gray-400">Накопилась подборка интересных ссылок и хочется поделиться
                            своими
                            открытиями? Вперед! Мы тут очень любознательные и с большим кругозором.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">• Репортажи</p>
                        <p class="text-sm dark:text-gray-400">Попали на знаковое мероприятие? Расскажите о самом
                            интересном
                            сообществу Девхаба.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto">
            <div class="pb-5 pt-4">
                <div class="grid xs:block sm:block grid-cols-2 relative overflow-hidden">
                    <div class="m-auto w-2/3 dark:text-gray-300">
                        <p class="text-3xl font-medium mb-5">Daxili bilikləri kəşf edin</p>
                        <p class="mb-4 font-light">Məlumat tapın və maraqlandığınız mövzuları izləmək üçün
                            <a href="/hubs" class="font-medium text-cerulean-500">hablardan</a> istifadə
                            edin.</p>
                    </div>
                    <div class="absolute top-0 bottom-0 xs:hidden sm:hidden right-0 w-20 z-10"
                         style="box-shadow: inset -25px 0 25px -25px #aaaaaa;"></div>
                    <div id="left"
                         class="w-full rounded bg-white dark:bg-transparent border dark:text-gray-300 dark:border-gray-700 ml-60 xs:hidden sm:hidden"
                         style="width: 120%">
                        <div class="px-3.5">
                            <div class="flex align-middle pt-3">
                                <div title="Paylaşmanın müəllifi" class="inline-flex no-underline">
                                    <img height="32" width="32" alt="user avatar"
                                         src="/upload/avatars/factory/image-1.png"
                                         class="w-6 h-6 flex-none image-fit rounded lazyload">
                                    <p class="text-sm pl-2 m-auto">
                                        @Samir.Karimov</p>
                                </div>
                                <p class="text-xs my-auto mr-auto pl-2">
                                    12 December, 6:05
                                </p>
                                <div class="flex items-center text-sm my-auto xs:hidden md:hidden sm:hidden">
                                    <i class="iconify" data-icon="mdi-clock-outline"></i>
                                    <p class="ml-1">2 dəqiqə</p>
                                </div>
                            </div>
                            <div class="grid grid-flow-col py-2">
                                <div class="my-auto">
                                    <p class="text-2xl xs:text-xl font-medium">
                                        Proqramçı olaraq daimi inkişaf tempində qala bilmək üçün məsləhətlər.
                                    </p>
                                </div>
                                <div
                                    aria-label="32 səs: 28 / 4" data-balloon-pos="left"
                                    class="flex gap-1 ml-auto pl-2 text-2xl items-center xs:text-xl mb-auto">
                                    <span
                                        class="text-green-600 hover:text-green-600 iconify transition-none cursor-pointer"
                                        data-icon="mdi-thumb-up-outline"></span>
                                    <p class="font-medium">
                                        24
                                    </p>
                                    <span class="hover:text-red-600 iconify transition-none cursor-pointer"
                                          data-icon="mdi-thumb-down-outline"></span>
                                </div>
                            </div>
                            <div class="flex">
                                <div
                                    class="border relative rounded text-sm cursor-pointer px-2 mr-2 hover:border-cerulean-500 dark:border-gray-700 dark:text-gray-400 dark:hover:border-cerulean-700">
                                    Grasp
                                </div>
                                <div
                                    class="border relative rounded text-sm cursor-pointer px-2 mr-2 hover:border-cerulean-500 dark:border-gray-700 dark:text-gray-400 dark:hover:border-cerulean-700">
                                    Design Principles
                                </div>
                                <div
                                    class="border relative rounded text-sm cursor-pointer px-2 mr-2 hover:border-cerulean-500 dark:border-gray-700 dark:text-gray-400 dark:hover:border-cerulean-700">
                                    JavaScript
                                </div>
                            </div>
                            <div class="markdown my-2 xs:hidden md:hidden sm:hidden">
                                <img src="https://miro.medium.com/max/700/1*qp3tmAbjazSnzIp6aF70VQ.jpeg" alt="">
                                <p>
                                    Son dövrlərdə proqramçı olaraq yeni texnologiyalara nəinki adaptasiya olmaq hətda
                                    onları izləmək belə çox çətin hala gəlib. Texnologiyanın inkişaf tempi inanılmaz
                                    sürətə sahibdir. Buna görə da biz proqramçılar bu inkişaf tempini öz daxilimizdə də
                                    saxlamalıyıq. Bunu edə bilmək üçün bir neçə məsləhətlərim olacaq.
                                </p>
                            </div>
                        </div>
                        <div
                            class="grid lg:grid-cols-main border-t rounded-b text-sm bg-gray-100 dark:bg-gray-800 dark:border-gray-700 mt-2 px-3.5 py-2">
                            <div class="flex xs:justify-between items-center md:justify-between sm:justify-between">
                                <div class="flex items-center">
                                    <i class="iconify" data-icon="mdi-eye-outline"></i>
                                    <p class="ml-1">2</p>
                                    <p class="ml-1 xs:hidden sm:hidden">Baxışların sayı</p></div>
                                <div class="pl-2">
                                    <div class="flex items-center">
                                        <i class="iconify" data-icon="mdi-comment-text-multiple-outline"></i>
                                        <p class="ml-1">96</p>
                                        <p class="ml-1 xs:hidden sm:hidden">Şerh</p>
                                    </div>
                                </div>
                                <div class="pl-2">
                                    <div class="flex items-center cursor-pointer">
                                        <i class="iconify" data-icon="mdi-bookmark-plus"></i>
                                        <div class="ml-1 xs:hidden">Seçilmiş</div>
                                    </div>
                                </div>
                                <div class="pl-2 flex items-center cursor-pointer">
                                    <i class="iconify" data-icon="mdi-share"></i>
                                    <p class="ml-1 xs:hidden sm:hidden">Paylaş</p></div>
                            </div>
                            <div aria-label="32 səs: 28 / 4" data-balloon-pos="up"
                                 class="my-auto h-1 balloon xs:hidden md:hidden sm:hidden">
                                <div class="my-auto bg-gray-300 w-full rounded h-1 relative default">
                                    <div class="absolute h-1 bg-green-600 rounded-l"
                                         style="width: 80%"></div>
                                    <div class="absolute h-1 bg-red-600 rounded-r right-0"
                                         style="width: 20%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto">
            <div class="py-10">
                <div class="grid relative xs:block sm:block grid-cols-2 overflow-hidden">
                    <div class="absolute top-0 bottom-0 xs:hidden sm:hidden w-20 z-10"
                         style="box-shadow: inset 25px 0 25px -25px #aaaaaa;"></div>
                    <div id="right"
                         class="w-full rounded bg-white dark:bg-transparent border dark:text-gray-300 dark:border-gray-700 -ml-60 xs:hidden sm:hidden"
                         style="width: 120%">
                        <div class="px-3.5">
                            <div class="flex align-middle pt-3">
                                <div title="Paylaşmanın müəllifi" class="inline-flex no-underline">
                                    <img height="32" width="32" alt="user avatar"
                                         src="/upload/avatars/factory/image-1.png"
                                         class="w-6 h-6 flex-none image-fit rounded lazyload">
                                    <p class="text-sm pl-2 m-auto">
                                        @Samir.Karimov</p>
                                </div>
                                <p class="text-xs my-auto mr-auto pl-2">
                                    12 December, 6:05
                                </p>
                                <div class="flex items-center text-sm my-auto xs:hidden md:hidden sm:hidden">
                                    <i class="iconify" data-icon="mdi-clock-outline"></i>
                                    <p class="ml-1">2 dəqiqə</p>
                                </div>
                            </div>
                            <div class="grid grid-flow-col py-2">
                                <div class="my-auto">
                                    <p class="text-2xl xs:text-xl font-medium">
                                        Proqramçı olaraq daimi inkişaf tempində qala bilmək üçün məsləhətlər.
                                    </p>
                                </div>
                                <div
                                    aria-label="32 səs: 28 / 4" data-balloon-pos="left"
                                    class="flex gap-1 ml-auto pl-2 text-2xl items-center xs:text-xl mb-auto">
                                    <span
                                        class="text-green-600 hover:text-green-600 iconify transition-none cursor-pointer"
                                        data-icon="mdi-thumb-up-outline"></span>
                                    <p class="font-medium">
                                        24
                                    </p>
                                    <span class="hover:text-red-600 iconify transition-none cursor-pointer"
                                          data-icon="mdi-thumb-down-outline"></span>
                                </div>
                            </div>
                            <div class="flex">
                                <div
                                    class="border relative rounded text-sm cursor-pointer px-2 mr-2 hover:border-cerulean-500 dark:border-gray-700 dark:text-gray-400 dark:hover:border-cerulean-700">
                                    Grasp
                                </div>
                                <div
                                    class="border relative rounded text-sm cursor-pointer px-2 mr-2 hover:border-cerulean-500 dark:border-gray-700 dark:text-gray-400 dark:hover:border-cerulean-700">
                                    Design Principles
                                </div>
                                <div
                                    class="border relative rounded text-sm cursor-pointer px-2 mr-2 hover:border-cerulean-500 dark:border-gray-700 dark:text-gray-400 dark:hover:border-cerulean-700">
                                    JavaScript
                                </div>
                            </div>
                            <div class="markdown my-2 xs:hidden md:hidden sm:hidden">
                                <img src="https://miro.medium.com/max/700/1*qp3tmAbjazSnzIp6aF70VQ.jpeg" alt="">
                                <p>
                                    Son dövrlərdə proqramçı olaraq yeni texnologiyalara nəinki adaptasiya olmaq hətda
                                    onları izləmək belə çox çətin hala gəlib. Texnologiyanın inkişaf tempi inanılmaz
                                    sürətə sahibdir. Buna görə da biz proqramçılar bu inkişaf tempini öz daxilimizdə də
                                    saxlamalıyıq. Bunu edə bilmək üçün bir neçə məsləhətlərim olacaq.
                                </p>
                            </div>
                        </div>
                        <div
                            class="grid lg:grid-cols-main border-t rounded-b text-sm bg-gray-100 dark:bg-gray-800 dark:border-gray-700 mt-2 px-3.5 py-2">
                            <div class="flex xs:justify-between items-center md:justify-between sm:justify-between">
                                <div class="flex items-center">
                                    <i class="iconify" data-icon="mdi-eye-outline"></i>
                                    <p class="ml-1">2</p>
                                    <p class="ml-1 xs:hidden sm:hidden">Baxışların sayı</p></div>
                                <div class="pl-2">
                                    <div class="flex items-center">
                                        <i class="iconify" data-icon="mdi-comment-text-multiple-outline"></i>
                                        <p class="ml-1">96</p>
                                        <p class="ml-1 xs:hidden sm:hidden">Şerh</p>
                                    </div>
                                </div>
                                <div class="pl-2">
                                    <div class="flex items-center cursor-pointer">
                                        <i class="iconify" data-icon="mdi-bookmark-plus"></i>
                                        <div class="ml-1 xs:hidden">Seçilmiş</div>
                                    </div>
                                </div>
                                <div class="pl-2 flex items-center cursor-pointer">
                                    <i class="iconify" data-icon="mdi-share"></i>
                                    <p class="ml-1 xs:hidden sm:hidden">Paylaş</p></div>
                            </div>
                            <div aria-label="32 səs: 28 / 4" data-balloon-pos="up"
                                 class="my-auto h-1 balloon xs:hidden md:hidden sm:hidden">
                                <div class="my-auto bg-gray-300 w-full rounded h-1 relative default">
                                    <div class="absolute h-1 bg-green-600 rounded-l"
                                         style="width: 80%"></div>
                                    <div class="absolute h-1 bg-red-600 rounded-r right-0"
                                         style="width: 20%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-auto w-2/3 dark:text-gray-300">
                        <p class="text-3xl font-medium mb-5">Səs vermədə iştirak edin</p>
                        <p class="mb-4 font-light">Zamanla daha çox kontekst əlavə edin və yeni məzmun göstərmək üçün
                            səsvermədən
                            istifadə edin.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="lg:container xl:container mt-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto py-32 relative">
            <div class="m-auto text-center w-2/3 dark:text-gray-300">
                <p class="text-3xl mb-6 font-medium mb-5">Uğur və təcrübələrinizi bölüşün</p>
                <p class="my-6 font-light">
                    Biz Azərbaycanda İT sənayesinin inkişafına kömək edirik. İnkişafa töhfə verin və təcrübə
                    mübadiləsi edin.
                </p>
                <a href="{{ route('article.create') }}"
                   class="btn h-7">
                    Töhfə vermək
                </a>
            </div>
            <div class="section__dots-bg dots-bg" style="
    height: 25rem;
    margin: 0 auto;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
    opacity: 1;
    background-position: 0 100%;
    background-repeat: repeat-x;
    background-size: 14px;
    background-image: url(https://svgshare.com/i/SPJ.svg);
    "></div>
        </section>
    </div>
@endsection


@push('scripts')
    <script type="text/javascript" src="{{ mix('js/about-us.js') }}"></script>
    <script>
        $(window).scroll(function () {
            /* Check the location of each desired element */
            $('#right').each(function (i) {
                const bottom_of_object = $(this).offset().top + $(this).outerHeight();
                const bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it in */
                if (bottom_of_window > bottom_of_object) {

                    $(this).addClass('leftToRight');

                }
            });

            $('#left').each(function (i) {
                const bottom_of_object = $(this).offset().top + $(this).outerHeight();
                const bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it in */
                if (bottom_of_window > bottom_of_object) {

                    $(this).addClass('rightToLeft');

                }
            });
        });
    </script>
@endpush

@section('styles')
    @parent
    <link rel="stylesheet" type="text/css" property="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="preload" href="{{ mix('js/about-us.js') }}" as="script">
    <style>
        .leftToRight {
            animation: leftToRight 3s ease-out forwards;
        }

        .rightToLeft {
            animation: rightToLeft 3s ease-out forwards;
        }

        @keyframes leftToRight {
            0% {
                transform: translateX(0rem);
            }
            100% {
                transform: translateX(10rem);
            }
        }

        @keyframes rightToLeft {
            0% {
                transform: translateX(0rem);
            }
            100% {
                transform: translateX(-10rem);
            }
        }
    </style>
@endsection
