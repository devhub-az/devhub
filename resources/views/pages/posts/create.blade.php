@extends('layouts.layout')

@section('title')Paylaşma yazmag @stop

@section('main')
    <div class="layout_body" id="app" onload="prettyPrint()">
        <div class="layout_content">
            <div class="page-header page-header_110">
                <h1 class="page-header__title">Paylaşma yazmag</h1>
            </div>
{{--            TODO:CREATE EDITOR--}}
            <div class="content_right">
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
