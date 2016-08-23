<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css">--}}

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/darkly/bootstrap.min.css">

    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/full-width.css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body id="app-layout">

@include('layouts.nav')
<div class="container">
    @if (session('success'))
        <div id="success-message" class="alert alert-success">
            <a class="close-success fa fa-close"></a> {{ session('success') }}
        </div>
        {{session()->forget('success')}}
    @endif
    @if (session('error'))
        <div id="error-message" class="alert alert-danger">
            <a class="close-success fa fa-close"></a> {{ session('error') }}
        </div>
        {{session()->forget('error')}}
    @endif
    <!-- Full Width Image Header -->
        <header class="header-image">
            <div class="headline">
                <div class="container">
                    <h1>Kot van de Toekomst</h1>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="container">

            <hr class="featurette-divider">

            <!-- First Featurette -->
            <div class="featurette" id="about">
                <img class="featurette-image img-circle img-responsive pull-right max-height-500 max-width-500" src="/img/layout/bathroom.jpg">
                <h2 class="featurette-heading">The bathroom,
                    <span class="text-muted">is it free or not?</span>
                </h2>
                <p class="lead"> Don't you find it annoying to get out of bed, getting your shower stuff but not sure if the bathroom is free?</p>
            </div>

            <hr class="featurette-divider">

            <!-- Second Featurette -->
            <div class="featurette" id="services">
                <img class="featurette-image img-circle img-responsive pull-left max-height-500 max-width-500" src="/img/layout/shower.png">
                <h2 class="featurette-heading">Check it out!
                    <span class="text-muted">& snooze some more.</span>
                </h2>
                <p class="lead"> With our service you can from now on check if the bathroom is free, you wake up, you see it's locked, you can snooze for 5 more minutes</p>
            </div>

            <hr class="featurette-divider">

            <!-- Third Featurette -->
            <div class="featurette" id="contact">
                <img class="featurette-image img-circle img-responsive pull-right max-height-500 max-width-500" src="/img/layout/calendar.png">
                <h2 class="featurette-heading">Want to be sure?
                    <span class="text-muted">Reservate a spot!</span>
                </h2>
                <p class="lead"> You can reservate a for a specific time and date, and you have a sure spot to shower.</p>
            </div>

            <hr class="featurette-divider">

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy;Kot van de Toekomst</p>
                    </div>
                </div>
            </footer>

        </div>
</div>

{{--<!-- JavaScripts -->--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
@yield('js')
<script>
    $(".close-success").click(function(){
        $("#success-message").addClass('hide');
        $("#error-message").addClass('hide');
    });
</script>
</body>
</html>