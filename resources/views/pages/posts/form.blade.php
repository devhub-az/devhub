<div class="edit-content">
    <div class="tab-pane fade show" id="postDetails" role="tabpanel" aria-labelledby="home-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title" class="control-label">{{ 'Title' }}</label>
            <input class="form-control" name="title" type="text" id="title"
                   value="{{ isset($post->title) ? $post->title : ''}}">
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content" class="control-label">{{ 'Content' }}</label>
            <div id="content">
                {!! isset($post->content) ? $post->content : '' !!}
            </div>
            <div id="test-editormd">
                <textarea style="display:none;">[TOC]

#### Disabled options

- TeX (Based on KaTeX);
- Emoji;
- Task lists;
- HTML tags decode;
- Flowchart and Sequence Diagram;

#### Editor.md directory

    editor.md/
            lib/
            css/
            scss/
            tests/
            fonts/
            images/
            plugins/
            examples/
            languages/
            editormd.js
            ...

```html
&lt;!-- English --&gt;
&lt;script src="../dist/js/languages/en.js"&gt;&lt;/script&gt;

&lt;!-- 繁體中文 --&gt;
&lt;script src="../dist/js/languages/zh-tw.js"&gt;&lt;/script&gt;
```
</textarea>
            </div>
{{--            <textarea class="form-control" rows="5" name="content" type="textarea" style="display: none"--}}
{{--                      id="content-textarea">{{ isset($post->content) ? $post->content : ''}}</textarea>--}}
            {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('hubs') ? 'has-error' : ''}}">
            <label for="tags" class="control-label">{{ 'Hablar' }}</label>
            <select name="tags[]" id="hubs" class="form-control" multiple>
                @foreach($hubs as $hub)
                    <option value="{{$hub->id}}"
                            @if(!empty($post) && in_array($hub->id, $post->tags->pluck('id')->toArray())) selected @endif>
                        {{$hub->name}}
                    </option>
                @endforeach
            </select>
            {{--            <input class="form-control" name="category_id" type="number" id="category_id" value="{{ isset($post->category_id) ? $post->category_id : ''}}" >--}}
            {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
        </div>

    </div>
    <button id="get-md-btn">Get Markdown</button>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" onclick="return foo();" value="Create">
    </div>
    <pre id="markdown" style="display: none"></pre>
</div>

@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/editor.md/css/editormd.min.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('vendor/editor.md/editormd.min.js')}}"></script>
    <script src="{{asset('js/quill-custom.js')}}"></script>
@endsection
