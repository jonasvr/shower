<div class="col-md-offset-2 col-md-8">
    <div class="form-horizontal">
        {{ Form::open(array('url' => URL::route('addInfo'), 'method' => 'Post')) }}
        <div class="form-group {{ $errors->has('street') ? ' has-error' : '' }}">
            {!! Form::label('street', 'Street', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-9">
                {!! Form::text('street','', ['class' => 'form-control']) !!}
                @if ($errors->has('street'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('nr') ? ' has-error' : '' }}">
            {!! Form::label('nr', 'Nr', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-9">
                {!! Form::text('nr','', ['class' => 'form-control']) !!}
                @if ($errors->has('nr'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('nr') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
            {!! Form::label('city', 'City', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-9">
                {!! Form::text('city','', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('postalcode') ? ' has-error' : '' }}">
            {!! Form::label('postalcode', 'Postalcode', ['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-9">
                {!! Form::text('postalcode','', ['class' => 'form-control']) !!}
                @if ($errors->has('postalcode'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('postalcode') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                {!! Form::submit('add Info', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
