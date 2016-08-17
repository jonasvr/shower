@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(Auth::user()->admin)
                @include('profile.partial.admin')
            @else
                @include('profile.partial.user')
            @endif
        </div>
    </div>
@endsection
