@extends('layouts.app')

@section('title')
    picture
@stop

@section('crop')
    {{--<script src="../jcrop/js/jquery.min.js"></script>--}}
    <script src="../jcrop/js/jquery.Jcrop.js"></script>
    <script src="../jcrop/js/jquery.Jcrop.min.js"></script>
    <script src="../jcrop/js/crop.js"></script>
    <link rel="stylesheet" href="../jcrop/css/jquery.Jcrop.css" type="text/css" />
    <link rel="stylesheet" href="../jcrop/css/crop.css" type="text/css" />
@endsection

@section('content')

    {{--{{dd($image)}}--}}
<div class="container">
    <div class="col-md-offset-2 col-md-8">

    <div class="panel panel-default">
        <div class="panel-heading">Register step 3: Crop that image</div>
        <div class="panel-body">
            <div class="row">
                <div class="span12">
                    <div class="jc-demo-box">
                        <div class="col-sm-8 ">
                            <img class="max-height img-responsive " src="/{{$image}}" id="target" alt="original" />
                        </div>
                        <div id="preview-pane" >
                            <div class="preview-container">
                                <img src="/{{$image}}" class="jcrop-preview" alt="Preview" />
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>

    {!! Form::open(array('url' => route('postCrop'), 'method' => 'post','enctype' =>'multipart/form-data')) !!}
    <?= Form::hidden('image', $image) ?>
    <?= Form::hidden('x', '', array('id' => 'x')) ?>
    <?= Form::hidden('y', '', array('id' => 'y')) ?>
    <?= Form::hidden('w', '', array('id' => 'w')) ?>
    <?= Form::hidden('h', '', array('id' => 'h')) ?>
    {!! Form::submit('crop', ['class' => 'btn btn-default hide', 'id'=>'btn']) !!}
    <?= Form::close() ?>

    <script type="text/javascript">
        $(function() {
            $('#target').Jcrop({
                onSelect: updateCoords
            });
        });
        function updateCoords(c) {
            // fix crop size: find ratio dividing current per real size
            var ratioW = $('#target')[0].naturalWidth / $('#target').width();
            var ratioH = $('#target')[0].naturalHeight / $('#target').height();
            var currentRatio = Math.min(ratioW, ratioH);
            $('#x').val(Math.round(c.x * currentRatio));
            $('#y').val(Math.round(c.y * currentRatio));
            $('#w').val(Math.round(c.w * currentRatio));
            $('#h').val(Math.round(c.h * currentRatio));
        };
    </script>
</div>
@stop