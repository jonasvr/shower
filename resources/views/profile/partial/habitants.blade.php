@if(count($habitants)>1)
    <div class="row">
        <h1>Habitants</h1>
        @foreach($habitants as $key => $item)
            @if($item->id != Auth::id())
            <div class="col-xs-4 col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3 col-md-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-md-9 text-right">
                                <div class="row">
                                <span class="pull-right font-30">{{explode(' ', $item->name, 2)[0]}}
                                    <br>  {{explode(' ', $item->name, 2)[1]}}</span>
                                </div>
                                @if(Auth::user()->admin)
                                <div class="row">
                                    <a href="{{URL::route('delete', ['id'=>$item->id]) }}">
                                        <i class="fa fa-close fa-3x" aria-hidden="true"></i>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
@endif