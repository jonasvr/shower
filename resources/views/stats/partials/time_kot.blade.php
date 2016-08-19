<div class="col-sm-6 col-md-6">
    <h2>Kot bathroom usage</h2>
    <hr>
    <div class="col-md-12">
        <div class="panel panel-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Time your kot spend in the bathroom">
            <div class="panel-heading">
                <div class="row">
                    <div class="hidden-xs col-sm-3 col-md-3">
                        <i class="fa fa-clock-o fa-4x"></i>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 text-right">
                        <div class="font-40 text-center">
                            {{floor($time_kot/60/24)}}d
                            {{floor($time_kot/60)}}h
                            {{$time_kot%60}}m
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>