<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vaslibre - Valencia Software Libre - Venezuela</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Angel Cruz <me@abr4xas.org>">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/iconfont.css') }}">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/loaders.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/pickadate-default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/pickadate-default.date.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>@import  url('https://fonts.googleapis.com/css?family=Dosis:400,700|Open+Sans:400,400i,700,700i');body{font-size: 18px;color: #6b7073;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;font-family:"Dosis",sans-serif;margin-top: 40px}h1,.h1,h2,.h2,h3,.h3,h4,.h4, h5,.h5,h6,.h6{font-family:"Dosis",sans-serif;text-transform:uppercase;font-weight:700;color:#6b7073;}h2,.h2 {font-size:36px;}h3,.h3{font-size:30px;}p{font-size:24px;letter-spacing:1px;line-height:28px;}.img-responsive{margin: 0 auto}.blog-post h4, .blog-post .post-meta {
    margin-left: inherit;
    font-size: 16px;
    line-height: 29px;
}</style>
</head>

<body data-spy="scroll" data-target="#main-navbar">
    <!-- Preloader -->
    <!--
    <div class="loader bg-white">
        <div class="loader-inner ball-scale-ripple-multiple vh-center">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    -->
    <div class="main-container" id="page">
        <header id="nav1-1">
            <nav class="navbar navbar-fixed-top" id="main-navbar" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="{{ route('home') }}" class="navbar-brand smooth-scroll">
                            <img src="images/logo-black.png" alt="logo">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('home') }}" class="smooth-scroll">Inicio</a></li>
                            <li><a href="" class="smooth-scroll">Nosotros</a></li>
                            <li><a href="" class="smooth-scroll">Galería</a></li>
                            <li><a href="" class="smooth-scroll">Publicaciones</a></li>
                            <li><a href="" class="btn-nav btn-green smooth-scroll">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')
        <footer id="footer6-2" class="footer f6 p-y-md bg-edit bg-dark">                
            <div class="container text-white inverse">
                <div class="row">
                    <div class="col-md-6">
                        <p class="m-t">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        <div class="footer-social social-btn m-t-md">
                            <a href="#" class="sb-white"><i class="fa fa-facebook text-black"></i></a>
                            <a href="#" class="sb-white"><i class="fa fa-google-plus text-black"></i></a>
                            <a href="#" class="sb-white"><i class="fa fa-twitter text-black"></i></a>
                            <a href="#" class="sb-white"><i class="fa fa-instagram text-black"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Section Footer 1</strong></p>
                        <ul class="footer-links m-t">
                            <li class="m-b"><a href="#" class="edit">Press</a></li>
                            <li class="m-b"><a href="#" class="edit">Terms of service</a></li>
                            <li class="m-b"><a href="#" class="edit">About</a></li>
                            <li class="m-b"><a href="#" class="edit">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Section Footer 2</strong></p>
                        <ul class="footer-links m-t">
                            <li class="m-b"><a href="#" class="edit">Other Link</a></li>
                            <li class="m-b"><a href="#" class="edit">Awesome Link</a></li>
                            <li class="m-b"><a href="#" class="edit">Link Wonderful</a></li>
                            <li class="m-b"><a href="#" class="edit">Gorgeous Link</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <p><strong>Section Footer 3</strong></p>
                        <ul class="footer-links m-t">
                            <li class="m-b"><a href="#" class="edit">Link Lovely</a></li>
                            <li class="m-b"><a href="#" class="edit">Other Link</a></li>
                            <li class="m-b"><a href="#" class="edit">Pretty Link</a></li>
                            <li class="m-b"><a href="#" class="edit">Link Smart</a></li>
                        </ul>
                    </div>
                </div><!--end of row-->
            </div><!--end of container-->
        </footer>
        <a href="#" class="top">Top</a>
    </div>
    <script src="{{ asset('js/plugins/jquery1.11.2.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.easing.1.3.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.countTo.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.formchimp.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.jCounter-0.1.4.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.vide.min.js') }}"></script>
    <script src="{{ asset('js/plugins/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/plugins/twitterFetcher_min.js') }}"></script>
    <script src="{{ asset('js/plugins/wow.min.js') }}"></script>
    <script src="{{ asset('js/plugins/picker.js') }}"></script>
    <script src="{{ asset('js/plugins/picker.date.js') }}"></script>
    <!-- Custom Script -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>