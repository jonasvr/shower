@extends('layouts.app')

@section('title')
    profile
@endsection

@section('content')
    @if(Auth::user()->steps == 0)
        <div class="row">
            <h1>Completing your Registration step 1.</h1>
            @if(Auth::user()->admin)
                @include('profile.partial.admin')
            @else
                @include('profile.partial.user')
            @endif
        </div>
    @elseif(Auth::user()->steps == 1 )
        @include('profile.partial.userInfo')
    @elseif(Auth::user()->steps == 2 )
        <div class="row">
            @if(isset($kot->id))
                <h1>Your kot Id is: {{$kot->code}}</h1>
            @else
                <h1> Your request hasn't been approved. </h1>
            @endif
            <hr>
            {{--@if(Auth::user()->admin)--}}
                {{--@include('profile.partial.addDevice')--}}
                {{--@include('profile.partial.requests')--}}
            {{--@endif--}}
            @include('profile.devices.showers')
            @include('profile.partial.myReservations')
            @include('profile.partial.habitants')

            {{--{{dd($devices)}}--}}
            {{--<button class="showButton" id="test">test</button>--}}
        </div>
    @endif
@endsection

@section('js')
    <script>
            $("h1").click(function(event){
                console.log(this.className);
                $(this.className).fadeOut();
                $(this.className).fadeOut("slow");
                $(this.className).fadeOut(3000);
            });
    </script>
@endsection