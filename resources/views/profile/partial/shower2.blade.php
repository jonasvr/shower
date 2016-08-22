
@if(count($devices))
    <div class="jumbotron row">
        <h2>Showers</h2>
        <hr>
        <div class="shower content">
            @foreach($devices as $key => $item)
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                    <a href="{{URL::route('calendar', ['id'=>$item->id]) }}">
                        @if($item->state == 2)
                            <div class="panel panel-warning">
                                @else
                                    <div class="panel  {{ ($item->state == 1 && $item->res == 1 ? 'panel-success' :'panel-danger')}}">
                                        @endif
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-3">
                                                    @if($item->state == 2)
                                                        <i class="fa fa-close fa-4x"></i>
                                                    @else
                                                        <i class="fa {{ ($item->state == 1 && $item->res == 1? 'fa-unlock' :'fa-lock')}} fa-4x"></i>
                                                    @endif
                                                </div>
                                                <div class="hidden-xs col-md-9 text-right">
                                                    <div class="font-40">
                                                        @if($item->state == 2)
                                                            Broken
                                                        @elseif($item->state == 1 && $item->res == 1)
                                                            Free
                                                        @else
                                                            Taken
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