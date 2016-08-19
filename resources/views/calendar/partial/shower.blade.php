@if($device->state == 2)
    <div class="panel panel-warning">
@else
    <div class="panel  {{ ($device->state == 1 && $device->res == 1 ? 'panel-success' :'panel-danger')}}">
@endif
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
                @if($device->state == 2)
                    <i class="fa fa-close fa-4x"></i>
                @else
                    <i class="fa {{ ($device->state == 1 && $device->res == 1 ? 'fa-unlock' :'fa-lock')}} fa-4x"></i>
                @endif
            </div>
            <div class="hidden-xs col-sm-9 col-md-9 text-right">
                <div class="font-40">
                @if($device->state == 2)
                    Broken
                @elseif($device->state == 1 && $device->res == 1)
                        Free
                    @else
                        Taken
                @endif
                </div>
            </div>
            <div class="col-md-12">
                <span class="pull-right font-30">{{$device->name}}</span>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>