@extends('main')
@section('title',"|  $post->title ")
@section('activequestion','active')
@section('javascript')
@endsection
@section('content')
    <!-- this pages shows a single question with it's comments ,tags, and user-->
    <div class="row">
        <div class="col-md-8 offset-md-2" style="margin-bottom: 10px">
            <h1 class="wrap">{{$post->title}}</h1>
            <hr>
            <div class="tags">
                @foreach( $post -> tags as $tag)
                    <span class="badge badge-secondary"> {{$tag -> name}}</span>
                @endforeach
            </div>
            <p>{!!$post->body!!}</p>
            <p>Published : {{$post->updated_at->diffForHumans()}} By <strong style="color: rebeccapurple"> {{$post->user->name}}</strong></p>
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
        </div>
        <hr>
        <div class="card-block col-md-8 offset-md-2">
            <h3>You can answer here :</h3>
            <form class="form-control" method="POST" action="{{route('comments.store',$post->id)}}">

                {{ csrf_field() }}
                @guest
                    <div class="form-control">
                        <textarea placeholder="comment" class="form-control " readonly></textarea>
                    </div>
                    <div class="form-control">
                        <button class="btn btn-warning btn-block">To comment please login <a href="{{route('login')}}">Click
                                here to redirect</a></button>
                    </div>
                @else
                    <div class="form-group">
                        <textarea id="textarea-mce" name="body" placeholder="Your comment here" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Add Comment</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                @endguest
            </form>
        </div>
    </div>
@endsection
