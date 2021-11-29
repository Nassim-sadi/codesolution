@extends('main')
@section('title',"| $user->name ")
@section('activeusers','active')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="single-user-page">
                <img src="{!! asset("uploads/avatars/")!!}/{{$user->avatar_user}}"  class="avatar single-user-img rounded-circle">
                 <h1>{{$user->name}}</h1>
                <p style="width: 100%;margin-bottom: 0">Joined : {{$user->created_at->diffForHumans()}}</p>
                <div>
                    <span class="badge badge-pill badge-primary"> #Posts</span>
                    <span class="badge badge-dark">{{$user->posts()->count()}}</span>
                </div>
                <div>
                    <span class="badge badge-pill badge-success"> #Answers</span>
                    <span class="badge badge-dark">{{$user->comments()->count()}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">List of Questions asked</h2>
            <hr>
            @foreach($user->posts as $post)
                <div class="question">
                    <h3 class="wrap"><a href="{{route('blog.single' ,$post->slug)}}">{{$post->title}}</a></h3>
                    <div class="tags">
                        @foreach( $post -> tags as $tag)
                            <span class="badge badge-secondary"> {{$tag -> name}}</span>
                        @endforeach
                    </div>
                    <a href="{{route('blog.single' ,$post->slug)}}" class="btn btn-primary float-md-right">Read-more</a>
                    <span style="width: 100%">Published : {{$post->updated_at->diffForHumans()}}</span>
                    <span class="badge badge-pill badge-success"> #Comments</span> <span class="badge badge-info">{{$post->comments()->count()}}</span>
                </div>
                <hr>
            @endforeach
        </div>
    </div>

@endsection