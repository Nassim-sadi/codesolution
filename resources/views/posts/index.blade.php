@extends('main')
@section('title','| All posts')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">All posts</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
        </div>
        <div class="col-md-3">
            <a href="{{route('posts.create')}}" class="btn btn-primary btn-lg btn-block btn-a">Ask a Question</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
            @foreach($posts as $post)
                <div class="col-md-10 question">
                    <h3>{{$post->title}}</h3>
                    <div class="tags">
                        @foreach( $post -> tags as $tag)
                            <span class="badge badge-secondary"> {{$tag -> name}}</span>
                        @endforeach
                    </div>
                    <span style="width: 100%">Published : {{$post->updated_at->diffForHumans()}} By <strong
                                style="color: rebeccapurple"> {{$post->user->name}}</strong></span>
                    <span class="badge badge-pill badge-success"> #Comments</span> <span
                            class="badge badge-info">{{$post->comments()->count()}}</span>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm btn-outline-info ">View</a></h3>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-sm btn-outline-info">edit</a>

                </div>
        <div class="col-md-12">
            <hr>
        </div>
            @endforeach
    </div>

@endsection
