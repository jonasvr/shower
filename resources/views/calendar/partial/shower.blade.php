<div class="panel  {{ ($device->state == 1 && $device->res == 1 ? 'panel-success' :'panel-danger')}}">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                 <i class="fa {{ ($device->state == 1 && $device->res == 1 ? 'fa-unlock' :'fa-lock')}} fa-4x"></i>
            </div>
            <div class="col-xs-9 col-md-9 text-right">
                <div class="font-40">

                @if($device->state == 1 && $device->res == 1)
                        free
                    @else
                        taken
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