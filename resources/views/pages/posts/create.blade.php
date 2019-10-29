@extends('front.layout')

@section('title')Paylaşma yazmag @stop

@section('css')
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.css"--}}
    {{--          integrity="sha256-08CTv29fptANK7CVsvnTZiZZYF9FHc+qtFzn/3cm4S4=" crossorigin="anonymous"/>--}}
    <link rel="stylesheet" href="https://uicdn.toast.com/tui-editor/latest/tui-editor.css"></link>
    <link rel="stylesheet" href="https://uicdn.toast.com/tui-editor/latest/tui-editor-contents.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.css"></link>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/github.min.css"></link>
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

                    <div id="editSection">
                        {{--                        {!! old('body') !!}--}}
                    </div>
                    {{-- <tags></tags> --}}
                    <div class="ui fluid multiple search selection dropdown">
                        <input name="tags" type="hidden">
                        <i class="dropdown icon"></i>
                        <div class="default text">Skills</div>
                        <div class="menu">
                            @foreach ($hubs as $hub)
                                <div class="item" data-value="{{ $hub['id'] }}">
                                    <i class="{{ strtolower($hub['name']) }} icon"></i>
                                    {{ $hub['name'] }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {!! Form::submit('Paylaşımı əlavə etmək', ['id' => 'submit', 'class' => 'btn btn-primary submit']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="content_right">
                <div class="default-block default-block_sidebar">
                    <div class="default-block__header">
                        <h3 class="default-block__header-title">FAQ - Frequently Asked Questions</h3>
                    </div>

                    <div class="default-block__content">
                        "Sandbox" da pre-moderator var: dərc olunmadan əvvəl, bütün materiallar bir UFO-nun qaranlıq
                        şüalarından keçir.
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
    <link rel="stylesheet" href="https://uicdn.toast.com/tui-editor/latest/tui-editor.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tui-editor/1.4.6/tui-editor-Editor.min.js"></script>
    <script src="https://uicdn.toast.com/tui-editor/latest/tui-editor-Editor-full.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/remarkable/1.7.4/remarkable.min.js"
            integrity="sha256-xVLIPE8qxiI4dvQKvrrhwkqYjmNEjj5l5n1+/vAtMUo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://unpkg.com/stackedit-js@1.0.7/docs/lib/stackedit.min.js"></script>
    <script src="https://uicdn.toast.com/tui-editor/latest/tui-editor-Editor-full.js"></script>
    <script>
        import Editor from 'tui-editor';
        const Editor = require('tui-editor');
        var editor = new Editor({
            el: document.querySelector('#editSection'),
            initialEditType: 'markdown',
            previewStyle: 'vertical',
            height: '300px'
        });

        $('.ui.dropdown')
            .dropdown()
        ;
        // $(document).ready(function(){
        //     $("#form").on("submit", function () {
        //         var hvalue = $('.tui-editor-contents').html();
        //         $(this).append("<textarea name='body' style='display:none'>"+hvalue+"</textarea>");
        //     });
        // });
        // document.getElementsByClassName('editor-preview').addEventListener("change", myScript);

        $(document).on('change', '.medName', function () {
            var val = $('option:selected', this).val()
            alert(val);
        });

        function myScript() {
            document.querySelectorAll('pre code').forEach((block) => {
                hljs.highlightBlock(block);
            });
        }

        var MDConvert = new Remarkable({
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
