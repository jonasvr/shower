<div class="col-md-offset-2 col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">Register step 1: fill out your Kot info</div>
        <div class="panel-body">
            <div class="form-horizontal">
                {{ Form::open(array('url' => URL::route('addKot'), 'method' => 'Post')) }}

                <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                    {!! Form::label('code', 'Koten code', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('code','', ['class' => 'form-control', 'autofocus'=>'autofocus]) !!}
                        @if ($errors->has('code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('code') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        {!! Form::submit('Add code', ['class' => 'btn btn-default']) !!}
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>

