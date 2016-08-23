@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="/full-width.css">

@endsection
@section('content')
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
            <h2 class="featurette-heading">The Shower,
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

@endsection
