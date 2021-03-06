@if(count($res))
<div class="jumbotron row">
    <h2>Your reservations</h2>
    <hr>
{{--<div class="col-md-offset-2 col-md-8">--}}
    <div>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th class="hidden-xs">#</th>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>cancel</th>
        </tr>
        </thead>
        <tbody>
        @foreach($res as $key => $item)
    {{--        {{dd($item)}}--}}
            <tr>
            <td  class="hidden-xs">{{$key +1}}</td>
            <td>{{$item->name}}</td>
            <td>{{ explode(' ', $item->start, 2)[0] }}</td>
            <td>{{ explode(' ', $item->start, 2)[1] }}</td>
            <td>
                <a href="{{URL::route('cancel', ['id'=>$item->id]) }}">
                    <span class="fa fa-close"></span>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
@endif