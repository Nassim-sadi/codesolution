@extends('main')
@section('title','| Questions')
@section('activequestion','active')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">Questions</h1>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-8 offset-md-2">
                @foreach($posts as $post)
                    <h2 class="wrap"><a href="{{route('blog.single',$post->slug)}}">{{$post->title}}</a></h2>
                    <div class="tags">
                        @foreach( $post -> tags as $tag)
                            <span class="badge badge-secondary"> {{$tag -> name}}</span>
                        @endforeach
                    </div>
                    <span>Published : {{$post->updated_at->diffForHumans()}} By <strong style="color: rebeccapurple"> {{$post->user->name}}</strong></span>
                    <a href="{{route('blog.single',$post->slug)}}" class="float-md-right btn btn-primary">Read more</a>
                       <span class="badge badge-pill badge-success"> #Comments</span> <span class="badge badge-info">{{$post->comments()->count()}}</span>
                    <hr>
                @endforeach
            </div>
        </div>

        <div class="col-md-2 offset-md-5">
            {!! $posts->links() !!}
        </div>
    </div>

@endsection
