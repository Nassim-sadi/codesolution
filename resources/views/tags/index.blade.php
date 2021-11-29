@extends('main')
@section('title','| All Tags')
@section('activetags','active')
@section('content')
    <div class="row">
        @guest
            <div class="col-md-12">
                <h1 class="text-center">All Tags</h1>
                <hr>
                <p>A tag is a keyword or label that categorizes your question with other, similar questions. Using the right
                    tags makes it easier for others to find and answer your question.
                </p>
            </div>
        @else
            <div class="col-md-12">
                <h1 class="text-center">All Tags</h1>
                <hr>
            </div>
            <div class="col-md-8">
                <p>A tag is a keyword or label that categorizes your question with other, similar questions. Using the right
                    tags makes it easier for others to find and answer your question.
                </p>
            </div>
            <div class="col-md-4">
                <h1>Create new Tag</h1>
                <form action="{{route('tags.store')}}" method="POST">
                    <div class="form-control">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="Enter Tag name">
                        <hr>
                        <input class="btn btn-success btn-block" type="submit" value="Create">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                </form>
            </div>
        @endguest
    </div>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="card-columns">
                    @foreach($tags as $tag)
                        <a style="display: block" href="{{route('tags.show', $tag->id )}}">
                        <div class="card show-user">
                            <div class="card-body">
                                 <span class="badge badge-secondary hover-color1"
                                            style="font-size: 20px">{{$tag->name}}</span>
                                <div class="small">
                                    <span class="badge badge-pill badge-primary"> #Posts</span>
                                    <span class="badge badge-dark">{{$tag->posts()->count()}}</span>
                                </div>
                            </div>
                        </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
