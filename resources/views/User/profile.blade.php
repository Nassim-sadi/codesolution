@extends('main')
@section('title','| Profile')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">{{$user->name}}'s Profile</h2>
            <hr>
            <img src="{!! asset("uploads/avatars/")!!}/{{Auth::user()->avatar_user}}" class="avatar">
            <form enctype="multipart/form-data" action="{{route('user.profile')}}" method="POST">
                <h3>Update Profile image</h3><br/>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" class="btn btn-sm btn-info" value="Submit">
            </form>

        </div>
    </div>

@endsection