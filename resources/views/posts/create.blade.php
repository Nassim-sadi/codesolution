@extends('main')
@section('title',`| Create new post`)
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/select2.min.css') }}">@endsection
@section('javascript')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 offset-md-2">
                <h1>Post New question</h1>
                <hr>
                <form method="POST" action="{{ route('posts.store') }}">
                    <div class="form-group">
                        <label name="title" for="title">Question title:</label>
                        <input placeholder="Enter your title here" id="title" name="title" required maxlength="119"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label name="tags" for="tags">Tags</label>
                        <select class="multiple-select2 form-control" style="width: 100%" name="tags[]" id="tags"
                                multiple="multiple">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label name="body" for="body">Question Body:</label>
                        <textarea placeholder="Enter The body of the Question here" id="textarea-mce" name="body"
                                  rows="10"
                                  class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" value="Publish your question" class="btn btn-block btn-success btn-lg">
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-lg btn-block btn-danger" href="{{route('posts.index')}}">Cancel</a>
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.multiple-select2').select2({placeholder: 'Select an option'})
        });
    </script>
@endsection
