@extends('front.layout')

@section('title')Paylaşma yazmag @stop

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
                <p>
                    {!! Form::label('title', 'Başlıq:') !!}
                    
                    {!! Form::text('title', null, ['class' => 'post__title', 'id' => 'title', 'placeholder' => 'Nəşrin nə olacağını başa düşmək üçün başlıq məna ilə doldurulmalıdır.', 'autocomplete' => 'off']) !!}
                    <div class="description">
                        @if($errors->has('title'))
                            <p style="color: red"> {{ $errors->first('title') }}</p>
                        @endif
                    </div>
                </p>

                <p>
                    {!! Form::label('text', 'Mətn:') !!}
                    <div class="description">
                        @if($errors->has('body'))
                            <p style="color: red"> {{ $errors->first('body') }}</p>
                        @endif
                    </div>
                    <textarea name='body' id="editor-container">
                        {!! old('body') !!}
                    </textarea>
                </p>

                {{-- <p>
                    <tags :data="menu"
                                :max-selected="5"
                                :multiple="true"
                                key-field="id"
                                show-field="name"
                                v-model="value" >
                    </tags>
                </p> --}}

                <p>
                    {!! Form::submit('Paylaşımı əlavə etmək', ['id' => 'submit', 'class' => 'btn btn-primary submit']) !!}
                </p>

                {!! Form::close() !!}
            </div>
        </div>
        <div class="content_right">
            <div class="default-block default-block_sidebar">
              <div class="default-block__header">
                <h3 class="default-block__header-title">MODERASİYA HAQQINDA</h3>
              </div>

              <div class="default-block__content">
                "Sandbox" da pre-moderator var: dərc olunmadan əvvəl, bütün materiallar bir UFO-nun qaranlıq şüalarından keçir.
              </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://uicdn.toast.com/tui-editor/latest/tui-editor-Editor-full.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/remarkable/1.7.4/remarkable.min.js" integrity="sha256-xVLIPE8qxiI4dvQKvrrhwkqYjmNEjj5l5n1+/vAtMUo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
// $(document).ready(function(){
//     $("#form").on("submit", function () {
//         var hvalue = $('.tui-editor-contents').html();
//         $(this).append("<textarea name='body' style='display:none'>"+hvalue+"</textarea>");
//     });
// });
// document.getElementsByClassName('editor-preview').addEventListener("change", myScript);

$(document).on('change','.medName',function(){
  var val = $('option:selected',this).val()
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
                } catch (err) {}
            }
            try {
                return hljs.highlightAuto(str).value;
            } catch (err) {}
            return ''; // use external default escaping
        }
    });

var simplemde = new SimpleMDE({
    autofocus: true,
    autosave: {
        enabled: true,
        uniqueId: "MyUniqueID",
        delay: 1000,
    },
    blockStyles: {
        bold: "__",
        italic: "_"
    },
    forceSync: true,
    hideIcons: ["guide", "heading"],
    indentWithTabs: true,
    insertTexts: {
        horizontalRule: ["", "\n\n-----\n\n"],
        image: ["![](http://", ")"],
        link: ["[", "](http://)"],
        table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
        video:["[", "](http://)"],
    },
    lineWrapping: false,
    parsingConfig: {
        allowAtxHeaderWithoutSpace: true,
        strikethrough: false,
        underscoresBreakWords: true,
    },
    placeholder: "Type here...",
    promptURLs: true,
    renderingConfig: {
        singleLineBreaks: false,
        codeSyntaxHighlighting: true,
    },
    shortcuts: {
        drawTable: "Cmd-Alt-T"
    },
    showIcons: ["code", "table"],
    spellChecker: false,
    status: true,
    status: ["autosave", "lines", "words", "cursor", {
        className: "keystrokes",
        defaultValue: function(el) {
            this.keystrokes = 0;
            el.innerHTML = "0 Keystrokes";
        },
        onUpdate: function(el) {
            el.innerHTML = ++this.keystrokes + " Keystrokes";
        }
    }], // Another optional usage, with a custom status bar item that counts keystrokes
    styleSelectedText: false,
    tabSize: 10,
    previewRender: function (plainMD) {return MDConvert.render(plainMD);},
    toolbar:[{
            name: "bold",
            action: SimpleMDE.toggleBold,
            className: "icon feather icon-bold",
            title: "Bold",
        },
        {
            name: "italic",
            action: SimpleMDE.toggleItalic,
            className: "icon feather icon-italic",
            title: "Italic",
        },
        {
            name: "strikethrough",
            action: SimpleMDE.toggleStrikethrough,
            className: "fa fa-strikethrough",
            title: "Strikethrough",
        },
        {
            name: "heading",
            action: SimpleMDE.toggleHeadingSmaller,
            className: "fa fa-header",
            title: "Toggle Heading",
        },
        {
            name: "quote",
            action: SimpleMDE.toggleBlockquote,
            className: "fa fa-quote-left",
            title: "Quote",
        },
        {
            name: "code",
            action: SimpleMDE.toggleCodeBlock,
            className: "icon feather icon-code",
            title: "Code",
        },
        {
            name: "genaric list",
            action: SimpleMDE.toggleUnorderedList,
            className: "icon devhub icon-bullet-list-line",
            title: "Generic List",
        },
        {
            name: "numbered list",
            action: SimpleMDE.toggleOrderedList,
            className: "icon devhub icon-number-list-line",
            title: "Numbered List",
        },
        {
            name: "link",
            action: SimpleMDE.drawLink,
            className: "icon feather icon-link",
            title: "Create Link",
        },
        {
            name: "table",
            action: SimpleMDE.drawTable,
            className: "icon feather icon-layout",
            title: "Insert Table",
        },
        {
            name: "image",
            action: SimpleMDE.drawImage,
            className: "icon feather icon-image",
            title: "Insert Image",
        },
        {
            name: "preview",
            action: SimpleMDE.togglePreview,
            className: "icon feather icon-eye no-disable",
            title: "Toggle Preview",
        },
        {
            name: "side by side",
            action: SimpleMDE.toggleSideBySide,
            className: "icon feather icon-sidebar no-disable no-mobile",
            title: "Toggle Side by Side",
        },
        {
            name: "fullscreen",
            action: SimpleMDE.toggleFullScreen,
            className: "icon feather icon-maximize",
            title: "Toggle Fullscreen no-disable no-mobile",
        },
        {
            name: "help",
            action: "https://simplemde.com/markdown-guide",
            className: "icon feather icon-help-circle",
            title: "Markdown Guide",
        },
        {
            name: "video",
            action: drawRedText,
            className: "icon feather icon-video",
            title: "Video add",
        },
    ],
    element: document.getElementById("editor-container") 
});

function drawRedText(editor) {
    var result = prompt("Enter youtube video link");
    var link = result.split('=')['1'];
    var cm = editor.codemirror;
    var output = '';
    var selectedText = cm.getSelection();
    var text = selectedText || 'https://www.youtube.com/embed/' + link;

    output = '<iframe width="560" height="315" src="' + text + '" frameborder="0" allowfullscreen></iframe>';
    cm.replaceSelection(output);

}

if (document.getElementById('error')) {
    iziToast.show({
        title: 'Xəta',
        icon: 'ico-error',
        message: 'Qanunsuz əməliyyat',
        progressBar: true,
        color:'red',
        close:false,
        position: 'bottomRight',
    });
}
</script>
@endsection