@if(count($devices))
<div class="jumbotron row">
    <h2>Showers</h2>
    <hr>
    <div class="shower content">
    @foreach($devices as $key => $item)
        {{--{{dd($item)}}--}}
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
            <a href="{{URL::route('calendar', ['id'=>$item->id]) }}">
            <div class="panel  {{ ($item->state == 1 && $item->res == 1 ? 'panel-success' :'panel-danger')}}">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3 col-md-3">
                            {{--{{dd($item->state)}}--}}
                            <i class="fa {{ ($item->state == 1 && $item->res == 1? 'fa-unlock' :'fa-lock')}} fa-4x"></i>
                        </div>
                        <div class="col-xs-9 col-md-9 text-right">
                            <div class="font-40">
                                @if($item->state == 1 && $item->res == 1)
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
            </a>
        </div>
    @endforeach
    </div>
</div>
@endif