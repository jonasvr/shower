@if(count($kr))
<div class="jumbotron row">
    <h2>Kot requests</h2>
    @foreach($kr as $key => $item)
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
                            <div class="row">
                                <a href="{{URL::route('accept', ['id'=>$item->id]) }}">
                                    <i class="fa fa-check fa-3x" aria-hidden="true"></i>
                                </a>
                                <a href="{{URL::route('decline', ['id'=>$item->id]) }}">
                                    <i class="fa fa-close fa-3x" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>
@endif