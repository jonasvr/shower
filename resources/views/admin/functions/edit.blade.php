@extends('layouts.app')

@section('title')
    Admin
@endsection

@section('content')
    <div class="row">
        <h1>The device code is: {{$device->device_code}}</h1>
        <hr>
        <div class="jumbotron  row">
            <h2>Edit device</h2>
            <hr>
            <div class="col-md-offset-2 col-md-8 form-horizontal">
                <div class="panel panel-default">
                    {{--<div class="panel-heading">Add device</div>--}}
                    <div class="panel-body">
                        {{ Form::open(array('url' => URL::route('editDevice'), 'method' => 'Post')) }}
                        {{Form::hidden('device_code',$device->device_code)}}

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Device name', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-9">
                                {!! Form::text('name',$device->name, ['class' => 'form-control']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                {!! Form::submit('Edit name', ['class' => 'btn btn-default']) !!}
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection