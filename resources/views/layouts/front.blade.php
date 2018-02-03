<!DOCTYPE html>
<html lang="en">
  <head>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-101288005-1', 'auto');
      ga('send', 'pageview');

    </script>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-9444650443184145",
        enable_page_level_ads: true
      });
    </script>
    <!-- generate the head meta tags  -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::to('favicon.ico') }}" type="image/x-icon">

    <!-- Font awesome -->
    <link href="{{ asset('fa/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    
    <!-- Main style sheet -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">    
    <!-- bootstrap select -->
    <link rel="stylesheet" href="{{asset('bootstrap-select/css/bootstrap-select.css') }}">
  
    <!-- Google Font -->
   <!--  <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> -->
    

    <style type="text/css">
      /*.navbar.navbar-default.main-navbar.navbar-fixed-top #request-demo-row{*/
      .navbar.navbar-default.main-navbar.navbar-fixed-top #navbar{
        display: none!important;
      }
    </style>


    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '153365521925842'); // Insert your pixel ID here.
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=153365521925842&ev=PageView&noscript=1"
    /></noscript>
    <!-- DO NOT MODIFY -->

    
    <!-- End Facebook Pixel Code -->


  </head>
  <body class="aa-price-range">  

  <!-- Start header section -->
  <header id="aa-header">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-header-area">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="aa-header-left">
                  <div class="aa-telephone-no">
                    <span class="fa fa-phone"></span>
                    <a href="tel:+23765955931">
                       Call +237-675-955-931
                    </a>
                  </div>
                  <div class="aa-email hidden-xs">
                    <span class="fa fa-envelope-o"></span> <a href="mailto:internshipspace@gmail.com">internshipspace@gmail.com</a>
                  </div>
                </div>              
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="aa-header-right">
                  <a href="{{ URL::to('register') }}" class="aa-register">Register</a>
                  @if(Auth::guest())
                  <a href="{{ URL::to('login') }}" class="aa-login">Login</a>
                  @else
                  <a href="/home" class="aa-login">Home</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header section -->

  <!-- Start menu section -->
  <section id="aa-menu-area">
    <nav class="navbar navbar-default main-navbar" role="navigation">  
      <div class="container">
        <div class="navbar-header row" style="float: none;">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->                                               
          <!-- Text based logo -->
            <div class="row" id="request-demo-row">
              <div class="col-sm-6">
                <a class="navbar-brand aa-logo" href="{{ URL::to('/') }}"> InternshipSpace</a>
              </div>
            </div>
           <!-- Image based logo -->
           <!-- <a class="navbar-brand aa-logo-img" href="{{ URL::to('front/index.html') }}"><img src="{{ ('logo.png') }}" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
            <li sclass="active"><a href="{{ URL::to('') }}"><small><i class="fa fa-home"></i></small> HOME</a></li>
            </li>
             {{-- 
             <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('') }}">COMPANIES <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">                
                <li><a href="{{ URL::to('') }}">COMPANIES</a></li>                                         
              </ul>
             --}}
            <li><a href=""><small><i class="fa fa-building-o"></i></small> COMPANIES</a></li>                                         
            <li><a href="{{route('contact-us') }}"><small><i class="fa fa-phone"></i></small> CONTACT US</a></li>                                         
          </ul>                            
        </div>
        <!--/.nav-collapse -->       
      </div>          
    </nav> 
  </section>
  <!-- End menu section -->

  @yield('content')

  <!-- Footer -->
  <footer id="aa-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="aa-footer-area">
          <div class="row">
            <div class="col-md-2 col-sm-6 col-xs-12">
              <div class="aa-footer-left">
               <p>&copy; <a rel="nofollow" href="http://internshipspace.com/">InternshipSpace.com</a></p>
              </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12">
              <div class="aa-footer-middle">
                <a target="_blank" href="https://www.facebook.com/internshipspace"><i class="fa fa-facebook"></i></a>
                <a target="_blank" href="https://twitter.com/internshipspace"><i class="fa fa-twitter"></i></a>
                <!-- <a target="_blank" href=""><i class="fa fa-google-plus"></i></a> -->
                <!-- <a href=""><i class="fa fa-youtube"></i></a> -->
                <a target="_blank" href="https://www.linkedin.com/company/internshipspace"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
              <div class="aa-footer-right">
                <a href="{{ URL::to('/') }}"><small><i class="fa fa-home"></i></small> Home</a>
                <a href="#"><small><i class="fa fa-building-o"></i></small> Companies</a>
                <a href="{{ route('contact-us') }}"><small><i class="fa fa-phone"></i></small> Contact us</a>
             
                <a href="{{ URL::to('') }}">Support</a>
                <a href="{{ URL::to('') }}">License</a>
                <a href="{{ URL::to('') }}">FAQ</a>
                <a href="{{ URL::to('') }}">Privacy & Term</a>
              
              </div>

             
            </div>            
          </div>
          <div style="clear: both;"></div>
            <hr />
            
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / Footer -->
  
  {{-- Modals here --}}
  @include('modals')

  <script src="{{ asset('js/app.js') }}"></script>
  
  <!-- Custom js -->
  <script src="{{ asset('bootstrap-select/js/bootstrap-select.js') }}"></script>
  <!-- <script src="{{ asset('js/jquery.onscreen.min.js') }}"></script> -->

  {{-- Since we are allowing this animation only on desktop and preventing it on mobile, we also need to check if we are not on mobile before adding the various jquery libraries to the dom. This should reduce the page size on mobile devices.  --}}


    <script src="{{ asset('js/viewportchecker.js') }}"></script>
    <script src="{{ asset('js/progressive-image.js') }}"></script>


  <script src="{{asset('js/custom.js') }}"></script> 

  @yield('extra_js')
  </body>
</html>