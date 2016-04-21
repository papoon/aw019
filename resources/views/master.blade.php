<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Euro 2016, AW019, noticias" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
        <!-- Custom Theme files -->
        <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- for bootstrap working -->
            <!-- Latest compiled and minified JavaScript -->
        <!-- //for bootstrap working -->
        <!-- web-fonts -->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <script src="{{ URL::asset('assets/js/responsiveslides.min.js') }}"></script>
            <script>
                $(function () {
                  $("#slider").responsiveSlides({
                    auto: true,
                    nav: true,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                  });
                });
            </script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/move-top.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/easing.js') }}"></script>
        <!--/script-->
        <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $(".scroll").click(function(event){     
                            event.preventDefault();
                            $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
                        });
                    });
        </script>
        

        <title>AW019</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:90" rel="stylesheet" type="text/css">

        @section('head')
            
        @show
    </head>
    <body>
        <!-- header-section-starts-here -->
    <div class="container-fluid">
            <div class="header">
                    
                <div class="header-bottom">
                        <div class="content">
                            <div class="title">AW019</div>
                        </div>
                    <div class="navigation">
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="wrap">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>  
                                </div>
                                <!--/.navbar-header-->
                            
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="{{ route('index') }}">Home</a></li>
                                        <li><a href="{{ route('noticias.index') }}">Noticias</a></li>
                                        <li class="dropdown">
                                            <a href="{{ route('estadios.index') }}" class="dropdown-toggle" data-toggle="dropdown">Estadios<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="estadios.html">EStadio1</a></li>
                                                <li class="divider"></li>
                                                <li><a href="estadios.html">Estadio2</a></li>
                                                <li class="divider"></li>
                                                <li><a href="estadios.html">Estadio3</a></li>
                                                <li class="divider"></li>
                                                <li><a href="estadios.html">Estadio4</a></li>
                                                <li class="divider"></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('jogos.index') }}">Jogos</a></li>
                                        <li><a href="{{ route('cidades.index') }}">Cidades</a></li>
                                        <li class="dropdown">
                                            <a href="{{ route('equipas.index') }}" class="dropdown-toggle" data-toggle="dropdown">Equipas<b class="caret"></b></a>
                                            <ul class="dropdown-menu multi-column columns-2">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <ul class="multi-column-dropdown">
                                                            <li><a href="business.html">Action</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="business.html">bulls</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="business.html">markets</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="business.html">Reviews</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="shortcodes.html">Short codes</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <ul class="multi-column-dropdown">
                                                           <li><a href="business.html">features</a></li>    
                                                            <li class="divider"></li>
                                                            <li><a href="entertainment.html">Movies</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="sports.html">sports</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="business.html">Reviews</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="business.html">Stock</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('estatisticas.index') }}">Estatisticas</a></li>
                                        <li><a href="{{ route('historia.index') }}">História</a></li>
                                        <div class="clearfix"></div>
                                    </ul>
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!--/.navbar-collapse-->
                     <!--/.navbar-->
                        </nav>
                    </div>
                    
                </div>
            </div>
            <!-- header-section-ends-here -->
                <!-- content-section-starts-here -->
        <div class="main-body">
            <div class="wrap">
                <div class="col-md-8 content-left">
                    @yield('content')
                </div>
                @include('sidebar')
                
            </div>
        </div>
        
        @include('footer')
    
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
                    /*
                    var defaults = {
                    wrapID: 'toTop', // fading element id
                    wrapHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear' 
                    };
                    */
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
    </script>
    <a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>