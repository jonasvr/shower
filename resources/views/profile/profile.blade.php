@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    @if(Auth::user()->steps == 0)
        <div class="row">
            @if(Auth::user()->admin)
                @include('profile.partial.admin')
            @else
                @include('profile.partial.user')
            @endif
        </div>
    @elseif(Auth::user()->steps == 1)
        @include('profile.partial.userInfo')
    @else
        <div class="row">
            @if(isset($kot->id))
                <h1>Dashboard</h1>
            @else
                <h1> Your request hasn't been approved yet. </h1>
            @endif
            <hr>
            @include('profile.devices.showers')
            @include('profile.partial.myReservations')
            @include('profile.partial.habitants')

            {{--{{dd($devices)}}--}}
            {{--<button class="showButton" id="test">test</button>--}}
        </div>
    @endif
@endsection



@section('js')
    <script src="/js/shower.js"></script>
@endsection