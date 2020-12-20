@extends('layouts.layout')

@section('title')Paylaşma yazmag @stop

@section('main')
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto" id="app">
        <p class="text-5xl font-medium pb-4">Paylaşma yazmag</p>
        <p class="font-light">
            Hablar müəyyən mövzularda nəşrlərin yerləşdirildiyi bölmələrdir. Onlar yalnız saytdakı bütün
            məlumatları rahat şəkildə qurulmasına deyil, həm də istifadəçi qidasının formalaşmasına kömək edir -
            yalnız maraqlı olan ocaqlara yazılmaq.
        </p>
        {{--            TODO:CREATE EDITOR--}}

        <div class="flex gap-3 w-full">
            <div class="border bg-white dark:bg-transparent dark:text-gray-300 text-black px-5 py-2 w-9/12">
                <editor></editor>
            </div>
            <div class="w-3/12">
                <div class="default-block default-block_sidebar">
                    <div class="default-block__header">
                        <h3 class="default-block__header-title">Yazmağdan əvvəl</h3>
                    </div>
                    <div class="default-block__content">
                        <div class="create-page__info-block">
                            <i class="icon feather icon-check-circle"></i>
                            <div>
                                Paylaşma saytın qaydalarını pozmamalıdır.
                            </div>
                        </div>
                        <hr>
                        <div class="create-page__info-block">
                            <i class="icon feather icon-book-open"></i>
                            <div>
                                Старайтесь оформлять публикации так, чтобы их было удобно читать.
                            </div>
                        </div>
                    </div>
                </div>

                <div id="rule" class="default-block default-block_sidebar">
                    <div class="default-block__header">
                        <h3 class="default-block__header-title">
                            Moderasiya haqqında
                        </h3>
                    </div>
                    <div class="default-block__content">
                        <h4 class="default-block__paragraph">Nədən yazmağ olmaz:</h4>
                        <ul class="default-block__list">
                            <li>reklam və PR paylaşmaları</li>
                            <li>xəbərlər və elanlar</li>
                            <li>vakansiyalar</li>
                            <li>əvvəllər digər saytlarda yayımlanan məqalələr</li>
                            <li>şirkətlər və göstərilən xidmətlər barədə şikayətlər</li>
                            <li>aşağı keyfiyyətli tərcümələr</li>
                            <li>izahat vermədən proqram kodunun hissələri</li>
                            <li>bir sözlü məqalələr</li>
                            <li>İT-mövzularla zəif əlaqəli və ya ümumiyyətlə əlaqəli olmayan məqalələr</li>
                        </ul>
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
