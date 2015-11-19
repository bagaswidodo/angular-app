<!DOCTYPE html>
<html lang="en" ng-app="dreamsApp">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dreams</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ url('/css/grayscale.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ url('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<!--         <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
 -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ url('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- Plugin JavaScript -->
        <script src="{{ url('js/jquery.easing.min.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ url('js/grayscale.js') }}"></script>

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{!! url('/') !!}">
                        <i class="fa fa-play-circle"></i>  Home
                    </a>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <main class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Bestmomo 2015</p>
            </div>
        </footer>

    </body>

</html>



