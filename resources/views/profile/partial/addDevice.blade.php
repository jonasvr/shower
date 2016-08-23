<div class="jumbotron  row">
    <h2>Add device</h2>
    <hr>
    <div class="col-md-offset-2 col-md-8 form-horizontal">
        <div class="panel panel-default">
            {{--<div class="panel-heading">Add device</div>--}}
            <div class="panel-body">
            {{ Form::open(array('url' => URL::route('addDevice'), 'method' => 'Post')) }}
            <div class="form-group {{ $errors->has('device_code') ? ' has-error' : '' }}">
                {!! Form::label('device_code', 'Device ID', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::text('device_code','', ['class' => 'form-control', 'autofocus'=>'autofocus']) !!}
                    @if ($errors->has('device_code'))
                        <span class="help-block">
                                                    <strong>{{ $errors->first('device_code') }}</strong>
                                                </span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::label('name', 'Device name', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-9">
                    {!! Form::text('name','', ['class' => 'form-control']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    {!! Form::submit('add Device', ['class' => 'btn btn-default']) !!}
                </div>
            </div>
            {{Form::close()}}
            </div>
        </div>
    </div>
    </div>
