
@extends('layouts.app')

@section('title')
    profile
@endsection

@section('content')
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
@endsection
