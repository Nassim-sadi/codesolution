@extends('main')
@section('title','| View Post')
@section('javascript')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="wrap">{{ $post->title }}</h1>
            <div class="tags">
                @foreach( $post -> tags as $tag)
                    <span class="badge badge-secondary"> {{$tag -> name}}</span>
                @endforeach
            </div>
            <p class="lead">{!! $post->body !!}</p>
            <hr>
            <h3>Answers :</h3>
            <span class="badge badge-pill badge-success"> #Comments</span> <span class="badge badge-info">{{$post->comments()->count()}}</span>
            <div class="comments">
                <ul class="list-group">
                    <br/>
                    @foreach($post->comments as $comment)
                        <li class="list-group-item comment-style2">
                            @if($comment->user->id === $post->user->id)
                                <img src="{!! asset("uploads/avatars/")!!}/{{$comment->user->avatar_user}}"
                                     class="nav-profile rounded-circle"> <strong style="color: rebeccapurple">{{ $comment->user->name }}</strong>
                                <small>{{$comment->updated_at->diffForHumans()}}</small>
                                :<div class="comment-style">{!!$comment->body!!}</div>
                            @else
                                <img src="{!! asset("uploads/avatars/")!!}/{{$comment->user->avatar_user}}"
                                     class="nav-profile rounded-circle"> <strong>{{ $comment->user->name }}</strong>
                                <small>{{$comment->updated_at->diffForHumans()}}</small>
                                :<div class="comment-style">{!!$comment->body!!}</div>
                            @endif
                        </li>
                        <br/>
                    @endforeach
                </ul>
            </div>
            <hr>
            <div class="card-block col-md-12">
                <h3>You can answer here :</h3>
                <form class="form-control" method="POST" action="{{route('comments.store',$post->id)}}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <textarea id="textarea-mce" name="body" placeholder="Your comment here" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Add Comment</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </div>
                </form>
            </div>

        </div>
        <div class="col-md-4">
            <div class="well edit-spacing">
                <dl class="dl-horizontal">
                    <label>URL:</label>
                    <p><a href="{{ route('blog.single' ,$post->slug) }}">{{route('blog.single' ,$post->slug)}}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Created at:</label>
                    <p>{{ date('M j, Y H:i',strtotime($post->created_at)) }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ date('M j, Y H:i',strtotime($post->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{route('posts.edit',$post->id,'Edit')}}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            <input type="submit" value="Delete" class="btn btn-danger btn-block">
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                            {{method_field('DELETE')}}
                        </form>
                    </div>
                    <div class="col-sm-12 btn-spacing">
                        <a href="{{ route('posts.index') }}" class="btn btn-info btn-block"> << See all Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
