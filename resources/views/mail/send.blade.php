<html>
<head>
   <style>
       .jumbotron{
           background-color: rgb(48, 48, 48);
           border-bottom-left-radius: 6px;
           border-bottom-right-radius: 6px;
           border-top-left-radius: 6px;
           border-top-right-radius: 6px;
           box-sizing: border-box;
           color: rgb(255, 255, 255);
           display: block;
           font-family: Lato, 'Helvetica Neue', Helvetica, Arial, sans-serif;
           font-size: 15px;
           /*height: 341px;*/
           line-height: 21.4286px;
           margin-bottom: 30px;
           margin-left: -15px;
           margin-right: -15px;
           padding-bottom: 48px;
           padding-left: 60px;
           padding-right: 60px;
           padding-top: 48px;
       }
   </style>
</head>
<body>
<div class="jumbotron">
    <h1>{!! $title !!}</h1>
    <hr>
    <p>{!! $content !!}</p>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
