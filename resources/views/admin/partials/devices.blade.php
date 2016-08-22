@if(count($devices))
    <div class="jumbotron row">
        <h2>Devices</h2>
        <hr>
        {{--<div class="col-md-offset-2 col-md-8">--}}
        <div>
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th class="hidden-xs">#</th>
                    <th>Name</th>
                    <th>State</th>
                    <th class="hidden-xs">Time used</th>
                    <th>Broken</th>
                    <th>Edit name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($devices as $key => $item)
                    {{--        {{dd($item)}}--}}
                    @if($item->state == 2)
                        <tr class="warning">
                    @else
                        <tr class="{{$item->state == 1 && $item->res == 1 ?"success":"danger"}}">
                    @endif
                        <td class="hidden-xs">{{$key +1}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            @if($item->state == 2)
                                Broken
                            @elseif($item->state == 1 && $item->res == 1)
                                Free
                            @else
                                Taken
                            @endif
                        </td>
                        <td class="hidden-xs">{{floor($item->spend_time/60/24)}}d
                            {{floor($item->spend_time/60)}}h
                            {{$item->spend_time%60}}m</td>
                        <td>
                            <a href="{{URL::route('broken', ['id'=>$item->id]) }}">
                                <span class="fa {{($item->state < 2?"fa-chain":"fa-chain-broken")}}"></span>
                            </a>
                        </td>
                        <td>
                            <a href="{{URL::route('editName', ['id'=>$item->id]) }}">
                                <span class="fa fa-pencil"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif