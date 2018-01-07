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
    <!-- <link rel="shortcut icon" href="{{ URL::to('front/img/favicon.ico') }}" type="image/x-icon"> -->

    <!-- Font awesome -->
    <link href="{{ asset('fa/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <!-- slick slider -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ URL::to('front/css/slick.css') }}"> -->
    {{--
    <!-- price picker slider -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ URL::to('front/css/nouislider.css') }}"> -->
    --}}
    <!-- Fancybox slider -->
    <!-- <link rel="stylesheet" href="{{ URL::to('front/css/jquery.fancybox.css') }}" type="text/css" media="screen" />  -->
    <!-- Theme color -->
    <!-- <link id="switcher" href="{{ URL::to('front/css/theme-color/default-theme.css') }}" rel="stylesheet">      -->

    <!-- Main style sheet -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">    
    <!-- bootstrap select -->
    <link rel="stylesheet" href="{{asset('bootstrap-select/css/bootstrap-select.css') }}">
    <!-- Animation library for notifications   -->
    <!-- <link href="{{ URL::to('css/animate.css') }}" rel="stylesheet"/> -->
   
    <!-- Google Font -->
   <!--  <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> -->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
  <!-- Pre Loader -->
  {{--
  <div id="aa-preloader-area">
    <div class="pulse"></div>
  </div>
  --}}
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="{{ URL::to('') }}"><i class="fa fa-angle-double-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

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
                    <span class="fa fa-envelope-o"></span> <a href="mailto:fanyuiharisu@gmail.com">fanyuiharisu [at] gmail [dot] com</a>
                  </div>
                </div>              
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="aa-header-right">
                  <a href="{{ URL::to('register') }}" class="aa-register">Register</a>
                  @if(Auth::guest())
                  <a href="{{ URL::to('login') }}" class="aa-login">Login</a>
                  @else
                  <a href="" class="aa-login">Backend</a>
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
                <a class="navbar-brand aa-logo" href="{{ URL::to('/') }}"> TheInternship</a>
              </div>
              <div class="col-sm-6">
                <a class="aa-view-btn pull-right request-a-demo" href=""> Request a <span>demo </span></a>
              </div>
            </div>
           <!-- Image based logo -->
           <!-- <a class="navbar-brand aa-logo-img" href="{{ URL::to('front/index.html') }}"><img src="{{ ('front/img/logo.png') }}" alt="logo"></a> -->
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
            <!-- <li><a href="{{ URL::to('') }}">GALLERY</a></li>                                          -->
            <!-- <li><a href="{{ URL::to('') }}">CONTACT</a></li> -->
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
               <p>&copy; <a rel="nofollow" href="http://theinternship.com/">TheInternship.com</a></p>
              </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12">
              <div class="aa-footer-middle">
                <a target="_blank" href="https://www.facebook.com/theinternship"><i class="fa fa-facebook"></i></a>
                <a target="_blank" href="https://twitter.com/theinternship"><i class="fa fa-twitter"></i></a>
                <!-- <a target="_blank" href=""><i class="fa fa-google-plus"></i></a> -->
                <!-- <a href=""><i class="fa fa-youtube"></i></a> -->
                <a target="_blank" href="https://www.linkedin.com/company/theinternship"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12">
              <div class="aa-footer-right">
                <a href="{{ URL::to('/') }}"><small><i class="fa fa-home"></i></small> Home</a>
                <a href=""><small><i class="fa fa-building-o"></i></small> Companies</a>
                <a href="{{ route('contact-us') }}"><small><i class="fa fa-phone"></i></small> Contact us</a>
              {{-- 
                <a href="{{ URL::to('') }}">Support</a>
                <a href="{{ URL::to('') }}">License</a>
                <a href="{{ URL::to('') }}">FAQ</a>
                <a href="{{ URL::to('') }}">Privacy & Term</a>
              --}}
              </div>

              <!-- <?php
                //echo json_encode($_footerLocation);
              ?> -->
            </div>            
          </div>
          <div style="clear: both;"></div>
            <hr />
            <h2 style="font-size: 20px">Quick Links</h2>
            
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / Footer -->

 
  <div class="modal fade" id="request-a-demo-div" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Request a Demo</h4>
        </div>
          <form class="form-horizontal" role="form" method="POST" action="">
              <div class="modal-body">
                <div class="form-horizontal">  
                  {!! csrf_field() !!}

                  <div class="form-group {{ $errors->has('name') ? ' has-error' : 'name' }}">
                      <label class="col-md-3 control-label">Name *</label>
                      <div class="col-md-8">
                        <input type="text" required name="name" class="form-control" value="{{ old('name') }}">
                          @if ($errors->has(''))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group {{ $errors->has('address') ? ' has-error' : 'address' }}">
                      <label class="col-md-3 control-label">Address *</label>
                      <div class="col-md-8">
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                          @if ($errors->has('address'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('address') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group {{ $errors->has('phone_number') ? ' has-error' : 'phone_number' }}">
                      <label class="col-md-3 control-label">Phone Number *</label>
                      <div class="col-md-8">
                        <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                          @if ($errors->has(''))
                              <span class="help-block">
                                  <strong>{{ $errors->first('phone_number') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group {{ $errors->has('email') ? ' has-error' : 'email' }}">
                      <label class="col-md-3 control-label">Email</label>
                      <div class="col-md-8">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group {{ $errors->has('request') ? ' has-error' : 'request' }}">
                      <label class="col-md-3 control-label">Request</label>
                      <div class="col-md-4" align="center" style="line-height: 1;">
                        <!-- <input type="checkbox" name="listing" class="form-control"> -->

                        <label class="switch block">
                          <input type="checkbox" name="property_listing" id="property_listing" value="{{ old('property_listing') }}" checked>
                          <div class="slider round"></div>
                        </label>
                        @if ($errors->has('property_listing'))
                            <span class="help-block">
                                <strong>{{ $errors->first('property_listing') }}</strong>
                            </span>
                        @endif
                        <label class="block"> Property Listing</label>
                      </div>

                      <div class="col-md-4" align="center" style="line-height: 1;">
                        <!-- <input type="checkbox" name="listing" class="form-control"> -->

                        <label class="switch block">
                          <input type="checkbox" name="property_management" id="property_management" value="{{ old('property_management') }}" checked>
                          <div class="slider round"></div>
                        </label>
                        @if ($errors->has('property_management'))
                            <span class="help-block">
                                <strong>{{ $errors->first('property_management') }}</strong>
                            </span>
                        @endif
                        <label class="block"> Property Management</label>
                      </div>
                  </div>

                  <div class="form-group {{ $errors->has('message') ? ' has-error' : 'message' }}">
                      <label class="col-md-3 control-label">Message *</label>
                      <div class="col-md-8">
                        <textarea rows="6" required name="message" class="form-control" placeholder="Your message here pls ...">{{ old('message') }}</textarea>
                          @if ($errors->has(''))
                              <span class="help-block">
                                  <strong>{{ $errors->first('message') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group" id="request-a-demo-error-div"> </div>
                  {{--
                  --}}
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger fa fa-times" data-dismiss="modal"> Close</button>
                  <button type="submit" class="btn btn-primary fa fa-paper-plane" id="submit-request-for-demo"> Submit my request </button>
              </div>
          </form>
      </div>
    </div>
  </div>
  
  {{-- Modals here --}}
  @include('modals')

  <script src="{{ asset('js/app.js') }}"></script>
  <!-- jQuery library -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  <!-- <script src="{{ asset('js/jquery.min.js') }}"></script>    -->
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- slick slider -->
  <!-- <script type="text/javascript" src="{{ URL::to('front/js/slick.js') }}"></script> -->
  {{--
  <!-- Price picker slider -->
  <!-- <script type="text/javascript" src="{{ URL::to('front/js/nouislider.js') }}"></script> -->
   <!-- mixit slider -->
  --}}
  <!-- <script type="text/javascript" src="{{ URL::to('front/js/jquery.mixitup.js') }}"></script> -->
  <!-- Add fancyBox -->        
  <!-- <script type="text/javascript" src="{{ URL::to('front/js/jquery.fancybox.pack.js') }}"></script> -->
  <!-- Custom js -->
  <script src="{{ asset('bootstrap-select/js/bootstrap-select.js') }}"></script>
  <!-- <script src="{{ asset('js/jquery.onscreen.min.js') }}"></script> -->

  {{-- Since we are allowing this animation only on desktop and preventing it on mobile, we also need to check if we are not on mobile before adding the various jquery libraries to the dom. This should reduce the page size on mobile devices.  --}}


    <script src="{{ asset('js/viewportchecker.js') }}"></script>
    <script src="{{ asset('js/progressive-image.js') }}"></script>


  {{--
  <script type="text/javascript">
      if(! /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        document.write("{{ asset('js/viewportchecker.js') }}")
        document.write("{{ asset('js/progressive-image.js') }}")
      }
  </script>
  --}}


  <script src="{{asset('js/custom.js') }}"></script> 

  @yield('extra_js')
  @yield('make_a_request_js')
  <script type="text/javascript">
    $(document).ready(function(e){
      {{-- ON LOAD, SHOW REQUEST FOR DEMO DIV IF LOADING WITH INPUT ERRORS --}}
      @if(count($errors) > 0)
        $('#request-a-demo-div').modal();
        console.log('has errors')
      @endif
    })
    $(function(){
      $('.progressive-image').progressiveImage(); 
    });
    $(window).on('resize', function(){
      $('.progressive-image').progressiveImage(); 
    });
  </script>

  </body>
</html>