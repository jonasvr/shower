
@extends('layouts.app')

@section('title')
    Calendar - {{$device->name}}
@endsection

@section('nav')

    <a class="navbar-brand" href="{{URL::route('getProfile')}}">
       profile
    </a> <div class="navbar-brand"> -  calendar - {{$device->name}}</div>
@endsection

@section('content')
    @if($device->state==2)
        <div class="jumbotron row">
            <div class="col-md-offset-1 col-md-3">
                @include('calendar.partial.shower')
            </div>
            <div class="row">
                <h1> The shower is broken.</h1>
            </div>
        </div>
    @else
        <div class="jumbotron row">
            <h2>Reserve</h2>
            <hr>
            <div class="col-md-offset-1 col-md-3">
                @include('calendar.partial.shower')
                @include('calendar.partial.reserve')
            </div>
            <div class="col-md-6">
                {!! $calendar->calendar() !!}
                {!! $calendar->script() !!}
            </div>
        </div>
    @endif
@endsection

@section('js')
    <script src="/js/calendar.js"></script>
@endsection