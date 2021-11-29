@extends('main')
@section('title','| Contact page')
@section('activecontact','active')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 ">
            <h1>Contact me</h1>
            <hr>
            <form action="{{url('contact')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control" placeholder="Enter your Email here">
                </div>
                <div class="form-group">
                    <label name="subject">subject:</label>
                    <input id="subject" name="subject" class="form-control" placeholder="Enter your Subject here">
                </div>
                <div class="form-group">
                    <label name="message">message:</label>
                    <textarea id="message" name="message" class="form-control"
                              placeholder="Type your message here ..." rows="5"></textarea>
                </div>
                <input type="submit" value="Send message" class="btn btn-success btn-lg btn-block">
            </form>
        </div>
    </div>
@endsection
