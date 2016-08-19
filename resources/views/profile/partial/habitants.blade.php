@if(count($habitants)>1)
    <div class="jumbotron row">
        <h2>Habitants</h2>
        <hr>
        @foreach($habitants as $key => $item)
{{--            {{dd($item)}}--}}
            @if($item->id != Auth::id())
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                @if($item->image_url)
                                        <img src="/{{$item->image_url}}" class="img-circle" alt="Cinque Terre" width="75" height="75">
                                @else
                                    <i class="fa fa-user fa-5x"></i>
                                @endif
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 text-right">
                                <div class="row">
                                <span class="pull-right font-30">{{explode(' ', $item->name, 2)[0]}}
                                    <br>  {{(isset(explode(' ', $item->name, 2)[1]) ? explode(' ', $item->name, 2)[1]:'')}}</span>
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