<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-101288005-1', 'auto');
      ga('send', 'pageview');

    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
            <!-- generate the head meta tags  -->
    {!! SEOMeta::generate() !!}
    <!-- generate the opengraph tags -->
    {!! OpenGraph::generate() !!}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                 <!-- bootstrap select -->
        <link rel="stylesheet" href="{{ URL::to('bootstrap-select/css/bootstrap-select.css') }}">
        <link href="{{ URL::to('fa/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">    

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 10;
            }
            @media (max-width: 360px){
				#title{
					font-size: 44px;
				}
				.links {
					font-size: 8px;
					font-weight: 300;
				}
			}
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body> <div class="container-fluid">
        <div class="flex-center full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div id="title" class="title m-b-md">
                    InternshipSpace
                </div>

                	Build your skill with industrial standard by doing internships in 
                	<div class="divider"> </div>
                	<br />
                <form method="get" action="/search">
                <div class="row">
                	<div class="form-group {{ $errors->has('country') || $errors->has('city') || $errors->has('state') ? ' has-error' : '' }}">
                		{!! csrf_field() !!}

	                    <div  class="col-md-4 col-sm-4">
	                    
	                    <input type="text" name="search" class="form-control" placeholder="company type or field of specialty">
	                       <span > search keyword </span>
                        </div>
	                    
	                    <div class="col-md-2 col-sm-4 {{ $errors->has('country') ? ' has-error' : '' }}">
                                         <select   class="col-md-12 form-control selectpicker" data-live-search="true" title="Select " tabindex="10"  name="country" id="country" value="{{ old('country') }}">
                            @if ($countries->count())
                                @foreach($countries as $country)
                                             <option value="{{$country->id}}" {{ old('country') == $country->id ? 'selected' : null }} > {{ $country->name}} </option>
                                @endforeach
                            @endif
                        </select>
                        <center>Country <a style="display: inline-block;" href="#" class="cant-find" data-missing="country" >{{-- Can't find my country --}}</a></center>

                        @if ($errors->has('country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div> 

                    <div class="col-md-2 col-sm-5 {{ $errors->has('state') ? ' has-error' : '' }}">
                        <select class="col-md-12 form-control selectpicker" data-live-search="true" title="Select State" id="state"  name="state">
                        </select>
                        <center>State <a style="display: inline-block;" href="#" class="cant-find" data-missing="state" >{{-- Can't find my state --}}</a></center>

                        @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>

                        <div class="col-md-2 col-sm-4 col-md-offset-0 col-sm-offset-2 {{ $errors->has('city') ? ' has-error' : '' }}">
                            <select class="col-md-12 form-control selectpicker" data-live-search="true" title="Select City" id="city"  name="city">
                            </select>
                            <center>Town / City <a style="display: inline-block;" href="#" class="cant-find" data-missing="city" >{{-- Can't find my town --}}</a> </center>
                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
	                    <div class="col-xs-12 col-sm-6 col-md-2">
	                   
	                    <button type="submit" class="btn btn-lg btn-primary">search</button>
	                    </div>
                	</div> 
                </div>
            </form>
            </div>
        </div>





    </div>

<script src="{{ URL::to('jquery/jquery2.1.4.min.js') }}"></script>
    <!-- footer -->
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
                <a href=""><small><i class="fa fa-building-o"></i></small> Companies</a>
                <a href="{{ route('contact-us') }}"><small><i class="fa fa-phone"></i></small> Contact us</a>
             
                
              
              </div>

             
            </div>            
          </div>
          <div style="clear: both;"></div>
            <hr />
            <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="aa-footer-right">
                <a href="{{ URL::to('/') }}"><small><i class="fa fa-home"></i></small> Home</a>
                <a href=""><small><i class="fa fa-building-o"></i></small> Companies</a>
                <a href="{{ route('contact-us') }}"><small><i class="fa fa-phone"></i></small> Contact us</a>
             
                <a href="{{ URL::to('') }}">Support</a>
                <a href="{{ URL::to('') }}">License</a>
                <a href="{{ URL::to('') }}">FAQ</a>
                <a href="{{ URL::to('') }}">Privacy & Term</a>
            </div>
            </div>
            </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / Footer -->

    <!-- scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

    <!-- bootstrap select -->
    <script src="{{ URL::to('bootstrap-select/js/bootstrap-select.js') }}"></script>
    </body>
</html>