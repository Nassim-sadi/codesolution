@extends('main')
@section('title','| Edit Tag')
@section('content')
<!-- Form to edit the tags -->
    <form action="{{route('tags.update', $tag->id)}}" method="POST">{{csrf_field()}} {{method_field('PUT')}}
        <div class="form-control">
            <label for="name">Name</label>
            <div class="row">
                <div class="col-md-8">
                    <input id="name" name="name" type="text" value="{{$tag->name}}" class="form-control"
                          style="resize: none"    placeholder="Edit Tag name">
                </div>
                <div class="col-md-2">
                    <input class="btn btn-success btn-block" type="submit" value="Save Changes">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </div>
                <div class="col-md-2">
                    <a class="btn btn-danger btn-block" href="{{ route('tags.show',$tag->id) }}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

@endsection