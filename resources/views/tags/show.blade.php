@extends('main')
@section('title',"| $tag->name Tag")
@section('activetags','active')
@section('content')

    <div class="row">
        <div class="col-md-auto">
            <h1>
                <span class="badge badge-secondary">
                    {{ $tag->name }} Tag
                </span>
                <small>{{$tag->posts()->count()}} Posts</small>
            </h1>
        </div>
        @guest
            @else
        <div class="col-md-auto">
            <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-outline-primary btn-sm"
               style="margin-top: 10px">Edit the tag</a>
        </div>
        <div class="col-md-auto">
            <form action="{{route('tags.destroy',$tag->id)}}" method="POST">
                <input type="submit" value="Delete" class="btn btn-outline-danger btn-sm" style="margin-top: 10px">
                <input type="hidden" name="_token" value="{{Session::token()}}">
                {{method_field('DELETE')}}
            </form>
        </div>
            @endguest
    </div>
        <h3 class="text-center">list of posts that contain this Tag</h3>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" style="width: 40%">title</th>
                    <th scope="col" style="width: 50%">Tags</th>
                    <th scope="col" style="width: 10%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tag->posts as $post)
                    <tr>
                        <td> {{$post->title}}</td>
                        <td> @foreach ($post->tags as $tag)
                                <span class="badge badge-secondary">{{$tag->name}}</span>
                            @endforeach
                        </td>
                        @guest
                        <td>
                            <a href="{{route('blog.single',$post->slug)}}" class="btn btn-sm btn-outline-info">View</a>
                        </td>
                         @else
                        <td>
                            <a href="{{route('posts.show',$post->id )}}" class="btn btn-sm btn-outline-info">View</a>
                        </td>
                        @endguest
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <div class="col-md-12">
            <div class="col-md-2 offset-md-5">
                {!! $tag->posts()->paginate(10) !!}
            </div>
        </div>
    </div>
@endsection