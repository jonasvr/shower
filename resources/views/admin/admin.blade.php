@extends('layouts.app')

@section('title')
    Admin
@endsection

@section('content')
    <div class="row">
        <h1>Admin</h1>
        <hr>
        <div class="jumbotron row">
            <h2>Your Kot code is: {{$kot->code}}</h2>
        </div>
        @include('admin.partials.requests')
        @include('profile.partial.addDevice')
        {{--@include('profile.devices.showers')--}}
        @include('admin.partials.devices')
    </div>
@endsection
