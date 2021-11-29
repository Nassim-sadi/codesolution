@extends('main')
@section('title','| About page')
@section('activeabout','active')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 about">
            <h1 class="text-center">About This site</h1>
            <p>This Website is university students 3rd year project ,the idea behind it is a place where to learn and share programming knowledge from the community members, Solve coding problems and fix mistakes .guests can view asked questions and answers .for them to ask a question or answer they should login first .</p>
            <p>This site was made with Laravel 5.6 which is a PHP framework using the Model MVC (Model view controller),it's a our First laravel project,also we used bootstrap to make it responsive ,some plugins where used such as :</p>
                <ul>
                    <li>select2 (For selecting tags)</li>
                    <li>TinyMCE (RichTextEditor "Code Codesample plugins" )</li>
                </ul>
            <strong>During Development</strong>
            <ul>
            <li>Integrated Development Environment "IDE" : <strong>JetBrains PhpStorm 2017.3.5</strong></li>
            <li>LocalServer integrated with Laravel</li>
            <li>Phpmyadmin As DBMS (With WampServer) and Mysql As a database</li>
            </ul>
            <strong>Development Members</strong>
            <ul>
                <li>Nassim Sadi</li>
                <li>Walid Hamza Boudjar</li>
                <li>Rami Zeroual</li>
            </ul>
            <hr>
            <h3 class="text-center">We Hope you enjoy your experience on the site</h3>
        </div>
    </div>
@endsection