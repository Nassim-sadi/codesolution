@extends('main')
@section('title','| Users')
@section('activeusers','active')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">All Users</h1>
            <p class="text-center">This page shows list of all users on our site along with their questions </p>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card-columns">
                @foreach($users as $user)
                    <a style="display: block" href="{{route('users.show', $user->id )}}">
                    <div class="card show-user">
                        <div class="card-body">
                            <img src="{!! asset("uploads/avatars/")!!}/{{$user->avatar_user}}"  class="nav-profile rounded-circle">
                             <span
                                        class=""
                                        style="font-size: 20px">{{$user->name}}</span>
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
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection