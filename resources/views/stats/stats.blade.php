@extends('layouts.app')

@section('title')
    profile
@endsection

@section('content')
        <h1>Stats</h1>
        <hr>
        <div class="jumbotron row">
            @include('stats.partials.all_total')
            @include('stats.partials.all_kot')
        </div>
        <div class="jumbotron row">
            @include('stats.partials.shower_all')
            @include('stats.partials.shower_kot')

        </div>
@endsection
