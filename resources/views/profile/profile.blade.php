@extends('layouts.app')

@section('title')
    profile
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1>Your kot Id is: {{$kot->code}}</h1>
            <hr>
            @if(Auth::user()->admin)
                @include('profile.partial.addDevice')
                @include('profile.partial.requests')
            @endif
            @include('profile.devices.showers')
            @include('profile.partial.habitants')
            {{--{{dd($devices)}}--}}
        </div>
    </div>
@endsection
