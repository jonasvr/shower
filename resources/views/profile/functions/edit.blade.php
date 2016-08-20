@extends('layouts.app')

@section('title')
    edit
@endsection

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Choose a new picture</div>
            <div class="panel-body">
                <div class="form-horizontal">
                    {!! Form::open(array('url' => route('addInfo2'), 'method' => 'post','enctype' =>'multipart/form-data', 'class' => 'form-horizontal')) !!}
                    <div class="form-group">
                        {!! Form::label('photo', 'upload picture', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::file('photo', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    {{Form::hidden('sex',Auth::user()->sex)}}
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            {!! Form::submit('Add Picture', ['class' => 'btn btn-default']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
