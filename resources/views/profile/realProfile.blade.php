@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
    <h1>Profile</h1>
    <hr>

    <div class="jumbotron text-center">
        <center>
            <img src="/{{Auth::user()->image_url}}" class="img-responsive img-circle" alt="">
        </center>
        <br>
        <a href="{{ URL::route('editPicture') }}"><i class="fa fa-btn fa-picture-o"></i> New Picture</a>
        <h3>{{Auth::user()->name}}</h3>
        <h3>{{(Auth::user()->sex? 'Female':'Male')}}</h3>
    </div>
@endsection