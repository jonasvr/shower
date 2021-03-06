<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{--kvdt--}}
                <img src="/img/layout/logo.png" class="img-responsive max-height-10"></img>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if (!Auth::guest())

                <li><a href="{{ URL::route('getProfile') }}">
                        Dasboard
                    </a>
                </li>
                <li><a href="{{ url('/stats') }}">
                        Stats
                    </a></li>
                    @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li><a href="{{ URL::route('getProfile') }}">
                            @if(!Auth::guest())
                                @if(Auth::user()->image_url)
                                    <img src="/{{Auth::user()->image_url}}" class="img-circle" alt="Cinque Terre" width="30" height="30">
                                @else
                                    <i class="fa fa-user fa-2x"></i>
                                @endif
                            @endif

                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::route('realProfile') }}"><i class="fa fa-btn fa-user"></i> profile</a></li>
                            @if(Auth::user()->admin)
                                <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-cog"></i> Admin</a></li>
                            @endif
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>