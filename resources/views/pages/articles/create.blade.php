@extends('layouts.layout')

@section('title')Paylaşma yazmag @stop

@section('main')
    <div class="flex gap-3 xs:block mt-2 md:gap-4 lg:container xl:container mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto"
         id="app">
        <div class="w-left xs:w-full">
            <editor></editor>
        </div>
        <div class="w-right xs:w-full">
            <div class="sticky top-2">
                <div>
                    <p class="font-medium text-base text-gray-700 mb-1 dark:text-gray-400">
                        Памятка автору
                    </p>
                    <div class="mb-5 rounded dark:bg-dpaper border dark:border-gray-700">
                        <div class="overflow-hidden divide-y rounded bg-white dark:bg-transparent text-black p-5">
                            <div class="flex items-center gap-3 pb-3">
                                <div class="relative w-10 h-10">
                                    <span class="iconify w-10 h-10 rounded" data-icon="ic:outline-check-box"
                                          data-inline="false"></span>
                                </div>
                                <div class="text-sm align-text-top dark:text-gray-300">
                                    Соблюдайте правила сайта
                                </div>
                            </div>
                            <div class="flex items-center gap-3 py-3">
                                <div class="relative w-10 h-10">
                                    <span class="iconify w-10 h-10 rounded" data-icon="ri:article-line"
                                          data-inline="false"></span>
                                </div>
                                <div class="text-sm align-text-top dark:text-gray-300">
                                    Следуйте советам и заботливо оформляйте посты
                                </div>
                            </div>
                            <div class="flex items-center gap-3 pt-3">
                                <div class="relative w-10 h-10">
                                    <span class="iconify w-10 h-10 rounded" data-icon="eva:image-fill"
                                          data-inline="false"></span>
                                </div>
                                <div class="text-sm align-text-top dark:text-gray-300">
                                    Загружайте картинки меньше 1МБ для обложки поста
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="font-medium text-base text-gray-700 mb-1 dark:text-gray-400">
                        О модерации
                    </p>
                    <div class="mb-5 rounded dark:bg-dpaper border dark:border-gray-700">
                        <div class="overflow-hidden rounded bg-white dark:bg-transparent text-black p-5 space-y-2">
                            <div class="pb-2 text-sm">
                                Не надо пропускать:
                            </div>
                            <ul class="list-none list-disc pl-4 space-y-2">
                                <li class="text-sm">рекламные и PR-публикации</li>
                                <li class="text-sm">вопросы и просьбы (для них есть Хабр Q&A);</li>
                                <li class="text-sm">вакансии (используйте Хабр Карьеру)</li>
                                <li class="text-sm">статьи, ранее опубликованные на других сайтах;</li>
                                <li class="text-sm">статьи без правильно расставленных знаков препинания, со смайликами, с
                                    обилием восклицательных знаков, неоправданным выделением слов и предложений и другим
                                    неуместным форматированием текста;
                                </li>
                                <li class="text-sm">жалобы на компании и предоставляемые услуги;</li>
                                <li class="text-sm">низкокачественные переводы;</li>
                                <li class="text-sm">куски программного кода без пояснений;</li>
                                <li class="text-sm">односложные статьи;</li>
                                <li class="text-sm">статьи, слабо относящиеся к IT-тематике или не относящиеся к ней
                                    вовсе.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/article-create.js') }}"></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/article-create.js') }}" as="script">
@endsection
