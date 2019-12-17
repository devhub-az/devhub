@extends('front.layout')

@section('title')Paylaşma yazmag @stop

@section('css')
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.css"--}}
    {{--          integrity="sha256-08CTv29fptANK7CVsvnTZiZZYF9FHc+qtFzn/3cm4S4=" crossorigin="anonymous"/>--}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/pell/dist/pell.min.css">
@stop

@section('main')
    <div class="layout_body" id="app">
        <div class="layout_content">
            <div class="post_left">
                <div class="edit-content">
                    <div class="page-header page-header_110">
                        <h1 class="page-header__title">Paylaşma yazmag</h1>
                    </div>
                    @if($errors->any())
                        <div id="error" style="display: none"></div>
                    @endif
                    {!! Form::open(['id' => 'form', 'url' => 'posts', 'method' => 'POST']) !!}
                    @csrf
                    {!! Form::label('title', 'Başlıq:') !!}

                    {!! Form::text('title', null, ['class' => 'post__title', 'id' => 'title', 'placeholder' => 'Nəşrin nə olacağını başa düşmək üçün başlıq məna ilə doldurulmalıdır.', 'autocomplete' => 'off']) !!}

                    @if($errors->has('title'))
                        <div class="description">
                            <p style="color: red"> {{ $errors->first('title') }}</p>
                        </div>
                    @endif


                    {!! Form::label('text', 'Mətn:') !!}

                    @if($errors->has('body'))
                        <div class="description">
                            <p style="color: red"> {{ $errors->first('body') }}</p>
                        </div>
                    @endif
                    <div class="editable" name="body"></div>

                    {{--                    <editor></editor>--}}

                    {{--                    <div class="ui fluid multiple search selection dropdown">--}}
                    {{--                        <input name="tags" type="hidden">--}}
                    {{--                        <i class="dropdown icon"></i>--}}
                    {{--                        <div class="default text">Skills</div>--}}
                    {{--                        <div class="menu">--}}
                    {{--                            @foreach ($hubs as $hub)--}}
                    {{--                                <div class="item" data-value="{{ $hub['id'] }}">--}}
                    {{--                                    <i class="{{ strtolower($hub['name']) }} icon"></i>--}}
                    {{--                                    {{ $hub['name'] }}--}}
                    {{--                                </div>--}}
                    {{--                            @endforeach--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {!! Form::submit('Paylaşımı əlavə etmək', ['id' => 'submit', 'class' => 'btn btn-primary submit']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
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

                <div class="default-block default-block_sidebar">
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

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/input.min.css">
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/remarkable/1.7.4/remarkable.min.js"
            integrity="sha256-xVLIPE8qxiI4dvQKvrrhwkqYjmNEjj5l5n1+/vAtMUo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css"
          type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor-insert-plugin/2.5.0/css/medium-editor-insert-plugin-frontend.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor-insert-plugin/2.5.0/css/medium-editor-insert-plugin.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor-insert-plugin/2.5.0/js/medium-editor-insert-plugin.min.js"></script>
    <script>
        var editor = new MediumEditor('.editable', {
            toolbar: {
                /* These are the default options for the toolbar,
                   if nothing is passed this is what is used */
                allowMultiParagraphSelection: true,
                buttons: ['bold', 'italic', 'underline', 'anchor', 'h2', 'h3', 'quote'],
                diffLeft: 0,
                diffTop: -10,
                firstButtonClass: 'medium-editor-button-first',
                lastButtonClass: 'medium-editor-button-last',
                relativeContainer: null,
                standardizeSelectionStart: false,
                static: false,
                /* options which only apply when static is true */
                align: 'center',
                sticky: false,
                updateOnEmptySelection: false
            }
        });
        $(function () {
            $('.editable').mediumInsert({
                editor: editor
            });
        });
    </script>
    <script>
        $('.ui.dropdown').dropdown();

        $(document).on('change', '.medName', function () {
            const val = $('option:selected', this).val();
            alert(val);
        });

        function myScript() {
            document.querySelectorAll('pre code').forEach((block) => {
                hljs.highlightBlock(block);
            });
        }

        const MDConvert = new Remarkable({
            highlight: function (str) {
                lang = hljs.highlightAuto(str).language;
                console.log(hljs.initHighlighting());
                if (lang && hljs.getLanguage(lang)) {
                    try {
                        return hljs.highlight(lang, str).value;
                    } catch (err) {
                    }
                }
                try {
                    return hljs.highlightAuto(str).value;
                } catch (err) {
                }
                return ''; // use external default escaping
            }
        });

        if (document.getElementById('error')) {
            iziToast.show({
                title: 'Xəta',
                icon: 'ico-error',
                message: 'Qanunsuz əməliyyat',
                progressBar: true,
                color: 'red',
                close: false,
                position: 'bottomRight',
            });
        }
    </script>
@endsection
