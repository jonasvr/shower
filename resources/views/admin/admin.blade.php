@extends('layouts.app')

@section('title')
    Admin
@endsection

@section('content')
    <div class="row">
        <h1>Your kot Id is: {{$kot->code}}</h1>
        <hr>
        @include('admin.partials.requests')
        @include('profile.partial.addDevice')
        {{--@include('profile.devices.showers')--}}
        @include('admin.partials.devices')
    </div>
@endsection