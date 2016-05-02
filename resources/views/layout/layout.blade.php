<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <title>Pusat Pengembangan Pribadi UKDW</title>
    <link rel="icon" type="image/png" href="http://i1043.photobucket.com/albums/b433/patrick_ricoo/logoukdw_zps8ora7xlt.png" />
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/clean-blog.css') }}" rel="stylesheet" type="text/css">
    
    @yield('css')

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery-2.2.0.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="{{ asset('js/clean-blog.min.js') }}"></script>
    <!--<script src="js/clean-blog.min.js"></script>-->

    @yield('script')

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    @include('layout.nav')

    @yield('header_about')
    @yield('header_activities')
    @yield('header_create')
    @yield('header_home')
    @yield('header_post')
    @yield('header_selfhelp')
    @yield('header_services')

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <hr>

    @include('layout.footer')

</body>

</html>
