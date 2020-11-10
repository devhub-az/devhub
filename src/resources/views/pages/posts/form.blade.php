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
            <textarea class="form-control" rows="5" name="content" type="textarea" style="display: none"
                      id="content-textarea">{{ isset($post->content) ? $post->content : ''}}</textarea>
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
    <div class="form-group">
        <input class="btn btn-primary" type="submit" onclick="return foo();" value="Create">
    </div>
    <pre id="markdown" style="display: none"></pre>
</div>

@section('styles')
    <link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.snow.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css"/>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/to-markdown/3.0.4/to-markdown.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="{{asset('js/quill-custom.js')}}"></script>
@endsection
