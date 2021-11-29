@extends ('main')
@section('title','| Home page')
@section('activehome','active')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @guest
                <div class="jumbotron jumbotron-fluid jumbotron-guest">
                    <div class="container">
                        <h1 class="display-4">Welcome to CodeSolution</h1>
                        <h3><span> Learn ,share ,Fix </span></h3>
                        <p>As a guest you can view Asked question with their answers ,filter question By Tags or
                            Users</p>
                        <p>If you want to ask a new question please Login First <a class="btn btn-outline-primary"
                                                                                   href="{{route('login')}}">Click Here
                                to login</a></p>
                        <p>Don't have an Account ? <a class="btn btn-outline-success" href="{{route('register')}}">Click
                                Here to Create one</a></p>
                    </div>
                </div>
            @else
                <div class="jumbotron jumbotron-fluid jumbotron-guest">
                    <div class="container">
                        <h1 class="display-4">Welcome to CodeSolution</h1>
                        <h3><span> Learn ,share ,Fix </span></h3>
                        <p>You can Ask a Question from here <a class="btn btn-outline-primary"
                                                               href="{{route('posts.create')}}">Ask a Question</a></p>
                        <p> go to Your Questions dashboard <a class="btn btn-outline-primary"
                                                              href="{{route('posts.index')}}">Dashboard</a></p>
                    </div>
                </div>
            @endguest
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="question">
                    <h3 class="wrap"><a href="{{route('blog.single' ,$post->slug)}}">{{$post->title}}</a></h3>
                    <div class="tags">
                        @foreach( $post -> tags as $tag)
                            <span class="badge badge-secondary"> {{$tag -> name}}</span>
                        @endforeach
                    </div>
                    <span style="width: 100%">Published : {{$post->updated_at->diffForHumans()}} By <strong
                                style="color: rebeccapurple"> {{$post->user->name}}</strong></span>
                    <span class="badge badge-pill badge-success"> #Comments</span> <span
                            class="badge badge-info">{{$post->comments()->count()}}</span>
                    <a href="{{route('blog.single' ,$post->slug)}}"
                       class="btn btn-primary float-md-right">Read-more</a>
                </div>
                <hr>
            @endforeach
        </div>
        <div class="col-md-3 offset-md-1">
            <h3>Top participating Users</h3>
            @foreach($users as $user)
                <hr>
                <a style="display: block" href="{{route('users.show', $user->id )}}">
                    <div class="show-user">
                        <img src="{!! asset("uploads/avatars/")!!}/{{$user->avatar_user}}"
                             class="nav-profile rounded-circle">
                        <strong style="color: rebeccapurple">{{ $user->name }}</strong>
                        <div>
                            <span class="badge badge-pill badge-success"> #Answers</span>
                            <span class="badge badge-dark">{{$user->comments()->count()}}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 offset-5">
            {{$posts->links()}}
        </div>
    </div>
@endsection
