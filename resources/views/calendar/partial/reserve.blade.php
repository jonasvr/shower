<div class="form-horizontal">
{{ Form::open(array('url' => URL::route('reserve'), 'method' => 'Post')) }}
    {{ Form::hidden('device_id', $device->id) }}
    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
        <label for="name" class="col-md-2 control-label">Date</label>

        <div class="col-md-12">
            {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('start') }}">--}}
            {{Form::input('date', 'date', $min=$today, ['class' => 'form-control', 'placeholder' => 'Date'])}}
            @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
        <label for="name" class="col-md-2 control-label">Time</label>

        <div class="col-md-12">
            {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('start') }}">--}}
            {{Form::input('time', 'time', null, ['class' => 'form-control', 'placeholder' => 'Date'])}}
            @if ($errors->has('time'))
                <span class="help-block">
                    <strong>{{ $errors->first('time') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-calendar-plus-o"></i> Reserve
            </button>
        </div>
    </div>
{{Form::close()}}
</div>