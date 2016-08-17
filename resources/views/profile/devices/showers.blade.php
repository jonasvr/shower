<div class="row">

    <h1>showers</h1>
    @foreach($devices as $key => $item)
        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
            <div class="panel  {{ ($item->state == 1 ? 'panel-success' :'panel-danger')}}">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3 col-md-3">
                            <i class="fa {{ ($item->state == 1 ? 'fa-unlock' :'fa-lock')}} fa-5x"></i>
                        </div>
                        <div class="col-xs-9 col-md-9 text-right">
                            <div class="font-40">
                                @if($item->state == 1)
                                    free
                                @else
                                    taken
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <span class="pull-right font-30">{{$item->name}}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

</div>