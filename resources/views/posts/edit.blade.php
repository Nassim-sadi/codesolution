@extends('main')
@section('title','| Edit blog Post')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/select2.min.css') }}">
@endsection
@section('javascript')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <form method="POST" action="{{ route('posts.update', $post->id) }}"> {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <textarea type="text" class="form-control input-lg" id="title" name="title" rows="1"
                              style="resize:none;" required maxlength="119">{{ $post->title }}</textarea>
                </div>
                <div class="form-group">
                    <label name="tags" for="tags">Tags</label>
                    <select class="multiple-select2 form-control " style="width: 100%" name="tags[]" id="tags"
                            multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="textarea-mce">Body:</label>
                        <textarea type="text" class="form-control input-lg" id="textarea-mce" name="body"
                                  rows="10">{{ $post->body }}</textarea>
                    </div>
                    <div>
                            <button type="submit" class="btn btn-success btn-block">Save changes</button>
                            <a href="{{ route('posts.show', $post->id) }}"
                               class="btn btn-danger btn-block">Cancel</a>
                    </div>
                    <div>
                        <hr>
                        <h3>Answers :</h3>
                        <span class="badge badge-pill badge-success"> #Comments</span> <span
                                class="badge badge-info">{{$post->comments()->count()}}</span>
                        <div class="comments">
                            <ul class="list-group">
                                <br/>
                                @foreach($post->comments as $comment)
                                    <li class="list-group-item comment-style2">
                                        @if($comment->user->id === $post->user->id)
                                            <img src="{!! asset("uploads/avatars/")!!}/{{$comment->user->avatar_user}}"
                                                 class="nav-profile rounded-circle"> <strong
                                                    style="color: rebeccapurple">{{ $comment->user->name }}</strong>
                                            <small>{{$comment->updated_at->diffForHumans()}}</small>
                                            :
                                            <div class="comment-style">{!!$comment->body!!}</div>
                                        @else
                                            <img src="{!! asset("uploads/avatars/")!!}/{{$comment->user->avatar_user}}"
                                                 class="nav-profile rounded-circle">
                                            <strong>{{ $comment->user->name }}</strong>
                                            <small>{{$comment->updated_at->diffForHumans()}}</small>
                                            :
                                            <div class="comment-style">{!!$comment->body!!}</div>
                                        @endif
                                    </li>
                                    <br/>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4>
            <div class="well edit-spacing">
                <dl class="dl-horizontal">

                    <a class="btn btn-info" href="{{ route('blog.single' ,$post->slug) }}">See how it looks !</a>
                </dl>
                <dl class="dl-horizontal">
                    <label>Created at:</label>
                    <p>{{ date('M j, Y H:i',strtotime($post->created_at)) }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('M j, Y H:i',strtotime($post->updated_at)) }}</p>
                </dl>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.multiple-select2').select2({placeholder: 'Select an option'});
            $('.multiple-select2').select2().val({!! json_encode($post->tags()->AllRelatedIds() )!!}).trigger('change');
        });
    </script>
@endsection
