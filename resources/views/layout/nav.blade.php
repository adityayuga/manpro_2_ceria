<!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">PUSAT PENGEMBANGAN PRIBADI</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="@yield('selected-home')">
                        <a href="{{ url('/') }}" >Home</a>
                    </li>
                    <li class="@yield('selected-services')">
                        <a href="{{ url('/services') }}">Our Services</a>
                    </li>
                    <li class="@yield('selected-activities')">
                        <a href="{{ url('/activities') }}">Our Activities</a>
                    </li>
                    <li class="@yield('selected-selfhelp')">
                        <a href="{{ url('/selfhelp') }}">Self Help</a>
                    </li>
                    <li class="@yield('selected-about')">
                        <a href="{{ url('/about') }}">About Us</a>
                    </li>
                    <li class="@yield('selected-create')">
                        <a href="{{ url('/create') }}">Create Article</a>
                    </li>
                    <li class="@yield('selected-kelola')">
                        <a href="{{ url('/kelola') }}">Kelola Article</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    