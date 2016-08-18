
@extends('layouts.app')

@section('title')
    profile
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-3">
                @include('calendar.partial.shower')
                <div>
                    @include('calendar.partial.reserve')

                </div>
            </div>
            <div class="col-md-6">
                {!! $calendar->calendar() !!}
                {!! $calendar->script() !!}
            </div>
        </div>
    </div>
@endsection
