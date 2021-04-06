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
        <section class="xl:container my-20 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto overflow-hidden xs:px-4">
            <div class="flex space-x-10 rounded-xl w-full px-12 py-12 xs:block"
                 style="background: linear-gradient(161deg, rgba(64, 229, 255, 0.5), rgba(20, 91, 252, 0.5)) rgb(107 107 107)">
                <div class="w-4/6 xs:w-full">
                    <div class="py-4 text-white flex space-x-2">
                        <span class="iconify text-2xl text-white" data-icon="mdi:pen" data-inline="false"></span>
                        <h1 class="text-xl font-semibold">Niyə paylaşma yazmaq faydalıdı?</h1>
                    </div>
                    <ul class="list-decimal space-y-2 ml-5 font-light text-white">
                        <li>
                            <p class="leading-relaxed text-white">
                                Написать пост — значит как следует разложить всё по полочкам, обобщить опыт и
                                поделиться им с другими. Приносить пользу чертовски приятно, попробуйте.
                            </p>
                        </li>
                        <li>
                            <p class="leading-relaxed text-white">
                                Никогда не угадаешь, кто прочитает ваш пост. Часто это те, кто разбирается в
                                вопросе
                                на голову лучше вас. Фидбэк от таких людей — возможно, самое ценное, что вы
                                приобретете на Девхабе.
                            </p>
                        </li>
                        <li>
                            <p class="leading-relaxed text-white">
                                Ваши публикации — это ваша репутация. Они лучше резюме расскажут, кто вы, чем
                                занимаетесь и в чем разбираетесь.
                            </p>
                        </li>
                        <li>
                            <p class="leading-relaxed text-white">
                                За первый крутой пост вы получите полноправный аккаунт и плюс в карму.
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="h-full w-2/6 m-auto xs:w-full xs:mt-4">
                    <img class="z-10 m-auto"
                         src="{{ asset('images/about/pro.svg') }}"
                         alt="" height="353" width="232">
                </div>
            </div>
        </section>
        <section class="flex space-x-5 xl:container my-20 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto overflow-hidden xs:block xs:space-y-4 xs:space-x-0 px-4">
            <div class="rounded-xl w-full px-12 pt-12" data-aos="fade-up"
                 style="background: linear-gradient(rgba(241, 235, 235, 0.95), rgba(240, 240, 240, 0.9)) rgb(90 130 242)">
                <span class="iconify text-5xl text-cerulean-100" data-icon="gg:feed" data-inline="false"></span>
                <h1 class="text-xl py-4 font-semibold text-cerulean-100">
                    Mən necə müəllif ola bilərəm?
                </h1>
                <p class="text-black font-semibold text-xl">
                    На Девхабе интересуются IT и всеми сторонами современной жизни: программированием, технологиями,
                    дизайном, наукой, образованием, играми, карьерой, здоровьем. Не обязательно писать хардкорно, но
                    важно, чтобы была польза.
                    <span class="text-gray-500">
                        Если у вас уже есть крутой материал на другой площадке, запостите его
                        и здесь, чтобы сообщество Девхаба тоже его оценило.
                    </span>
                </p>
                <div class="relative mt-12 w-1/2 mx-auto xs:w-full">
                    <img class="relative z-10" style="top: 3.45745%; left: 5.51471%"
                         src="{{ asset('images/about/post.svg') }}"
                         alt="" height="353" width="232">
                </div>
            </div>
            <div class="rounded-xl w-full px-12 pt-12" data-aos="fade-up"
                 style="background: conic-gradient(from 90deg at 50% 0%, #353535, 50%, #222, #111)">
                <span class="iconify text-5xl text-cerulean-100" data-icon="gg:feed" data-inline="false"></span>
                <h1 class="text-xl py-4 font-semibold text-cerulean-100">Как писать классно</h1>
                <p class="text-white font-semibold text-xl">
                    На случай, если вы не знаете, как подступиться к тому или иному формату, мы написали короткие гайды, о том, как сделать ваши материалы полезными и оформить так, чтобы было удобно читать.
                    <span class="text-gray-400">Лента помогает отслеживать за интересными новшествами в мире IT.</span>
                </p>
                <div class="relative w-1/2 mt-12 mx-auto">
                    <img class="relative z-10" src="{{ asset('images/about/iphone_cut.png') }}"
                         alt="Android" height="376" width="272">
                    <img class="absolute" style="top: 3.45745%; left: 5.51471%; width: 88.9706%;"
                         src="{{ asset('images/about/home_m.png') }}"
                         alt="" height="353" width="232">
                </div>
            </div>
        </section>
        <section class="lg:container xl:container my-20 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto" data-aos="fade-up">
            <h2 class="mb-6 font-sans text-center text-3xl mb-4 font-medium leading-none tracking-tight dark:text-gray-300 sm:text-4xl mx-auto">
                Hansı formatı seçim?
            </h2>
            <about-example id="app"></about-example>
            <div class="flex text-gray-700 space-x-2 xs:block xs:space-y-4 xs:space-x-0">
                <div class="space-y-4">
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">Новости</p>
                        <p class="text-sm dark:text-gray-400">Первыми узнали о сбое в Сети? Увидели новый продукт раньше
                            всех?
                            Прочитали
                            свежий законопроект? Поделитесь с остальными.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">Кейсы</p>
                        <p class="text-sm dark:text-gray-400">Организовали умный дом за 10к рублей? Переехали в Новую
                            Зеландию
                            писать код по распознаванию киви? Пишите пост, это же очень интересно.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">Туториалы</p>
                        <p class="text-sm dark:text-gray-400">Справились с непростой задачей? Расскажите по пунктам, как
                            ее
                            решить — читатели будут благодарны.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">Ретроспективы</p>
                        <p class="text-sm dark:text-gray-400">Помните в подробностях, как зарождались вещи, к которым
                            уже все
                            привыкли? Кайф! Это то, что приятно почитать долгими зимними вечерами!</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">Обзоры</p>
                        <p class="text-sm dark:text-gray-400">Вы перепробовали кучу моноколес, стриминговых сервисов или
                            сред
                            разработки? Поделитесь, что там к чему, на что лучше обратить внимание.</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">Мнения</p>
                        <p class="text-sm dark:text-gray-400">У вас особый взгляд на острый вопрос? Хотите это обсудить?
                            Напишите, что думаете, и готовьтесь провести вечер в комментариях.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">Справочные</p>
                        <p class="text-sm dark:text-gray-400">Вы глубоко изучили сложную тему? Готовы рассказать на
                            пальцах,
                            как все устроено? Дерзайте!</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">Интервью</p>
                        <p class="text-sm dark:text-gray-400">Есть доступ к человеку с необычным опытом? Срочно берите
                            его в
                            охапку и задавайте вопросы. А что он ответил, потом расскажите Хабру.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">Дайджесты</p>
                        <p class="text-sm dark:text-gray-400">Накопилась подборка интересных ссылок и хочется поделиться
                            своими
                            открытиями? Вперед! Мы тут очень любознательные и с большим кругозором.</p>
                    </div>
                    <div class="bg-white dark:bg-dpaper border p-2 h-28 dark:border-gray-700">
                        <p class="font-semibold mb-2 dark:text-gray-300">Репортажи</p>
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
                    <div class="absolute top-0 bottom-0 xs:hidden sm:hidden right-0 w-20 z-10 shadow-lwhite dark:shadow-lblack"></div>
                    <div class="w-full rounded bg-white dark:bg-transparent border dark:text-gray-300 dark:border-gray-700 xs:hidden sm:hidden"
                         data-aos="fade-left" style="width: 120%">
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
                                    class="flex space-x-1 ml-auto pl-2 text-2xl items-center xs:text-xl mb-auto">
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
                    <div class="absolute top-0 bottom-0 xs:hidden sm:hidden w-20 z-10 shadow-rwhite dark:shadow-rblack"></div>
                    <div class="w-full rounded bg-white dark:bg-transparent border dark:text-gray-300 ml-[-20%] dark:border-gray-700 xs:hidden sm:hidden"
                         data-aos="fade-right" style="width: 120%">
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
                                    class="flex space-x-1 ml-auto pl-2 text-2xl items-center xs:text-xl mb-auto">
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
        <section class="lg:container xl:container mt-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto py-12 relative">
            <div class="px-32 mb-12">
                <h1 class="text-4xl py-4 font-semibold text-black text-center">
                    Access even outside of the browser
                </h1>
                <p class="px-16 text-center text-lg">
                    Raindrop.io is available as Chrome, Firefox, Safari, and Edge extension. <br>
                    But we also have Web, Windows, Mac, iPad, iPhone, and Android app.
                </p>
            </div>
            <img src="{{ asset('images/about/devices.png') }}" alt="">
        </section>
        <section class="lg:container xl:container mt-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto py-12 relative">
            <div class="px-32">
                <h1 class="text-4xl py-4 font-semibold text-black text-center">
                    Но подождите, это еще не все
                </h1>
            </div>
            <div class="grid grid-cols-3 mt-2">
                <div class="flex space-x-2 p-4">
                    <span class="iconify text-3xl" data-icon="tabler:device-floppy" data-inline="false"></span>
                    <div>
                        <p class="font-medium text-xl">Сохраняйте статьи</p>
                        <p class="text-base">Сохраняйте что бы не потерять интересные статьи.</p>
                    </div>
                </div>
                <div class="flex space-x-2 p-4">
                    <span class="iconify text-3xl" data-icon="tabler:flag" data-inline="false"></span>
                    <div>
                        <p class="font-medium text-xl">Языки</p>
                        <p class="text-base">Английский, Русский, Азербайджанский.</p>
                    </div>
                </div>
                <div class="flex space-x-2 p-4">
                    <span class="iconify text-3xl text-yellow-500" data-icon="tabler:bolt" data-inline="false"></span>
                    <div>
                        <p class="font-medium text-xl">Карма</p>
                        <p class="text-base">Зарабатывайте карму и будьте первыми в рейтинге.</p>
                    </div>
                </div>
                <div class="flex space-x-2 p-4">
                    <span class="iconify text-2xl" data-icon="tabler:message" data-inline="false"></span>
                    <div>
                        <p class="font-medium text-xl">Комментарии</p>
                        <p class="text-base">Участвуйте в обсуждениях.</p>
                    </div>
                </div>
                <div class="flex space-x-2 p-4">
                    <span class="iconify text-3xl" data-icon="tabler:file-invoice" data-inline="false"></span>
                    <div>
                        <p class="font-medium text-xl">CV</p>
                        <p class="text-base">Делитесь своим Сиви в профиле для работадателей.</p>
                    </div>
                </div>
                <div class="flex space-x-2 p-4">
                    <span class="iconify text-2xl" data-icon="tabler:eye" data-inline="false"></span>
                    <div>
                        <p class="font-medium text-xl">Темы</p>
                        <p class="text-base">Тёмная или светлая, ваш выбор.</p>
                    </div>
                </div>
                <div class="flex space-x-2 p-4">
                    <span class="iconify text-3xl" data-icon="tabler:mist" data-inline="false"></span>
                    <div>
                        <p class="font-medium text-xl">Своя лента новостей</p>
                        <p class="text-base">Следите за статьями интересуещих вас авторов или хабов</p>
                    </div>
                </div>
                <div class="flex space-x-2 p-4">
                    <span class="iconify text-4xl" data-icon="octicon:pencil-24" data-inline="false"></span>
                    <div>
                        <p class="font-medium text-xl">Делитесь опытом</p>
                        <p class="text-base">Пишите статьи, делитесь опытом и становитесь популярные среди коллег.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@push('scripts')
    <script type="text/javascript" src="{{ mix('js/about-us.js') }}"></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/about-us.js') }}" as="script">
@endsection
