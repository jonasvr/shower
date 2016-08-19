<html>
<head></head>
<body style="background: white; color: black">
<h1>{!! $title !!}</h1>
<p>{!! $content !!}</p>
<p><a href="{{URL::to('/')}}/admin/accept/{{$accept}}">accept</a> or <a href="{{URL::to('/')}}/admin/decline/{{$decline}}"> decline</a></p>
</body>
</html>
