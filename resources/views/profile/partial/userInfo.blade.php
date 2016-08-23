<div class="col-md-offset-2 col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">Register step 2: your picture & sex please</div>
        <div class="panel-body">
            <div class="form-horizontal">
            {!! Form::open(array('url' => route('addInfo2'), 'method' => 'post','enctype' =>'multipart/form-data', 'class' => 'form-horizontal')) !!}
                <div class="form-group">
                    {!! Form::label('photo', 'upload picture', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::file('photo', ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('sex', 'sex:', ['class' => 'col-md-3  control-label']) !!}
                    <div class="col-md-9">
                        <input type="radio" id="man" name="sex" value="0" checked="checked"> <label for="man">Male</label><br>
                        <input type="radio" id="female" name="sex" value="1"> <label for="female">Female</label><br>
                    </div>
                </div>
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