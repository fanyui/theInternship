<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">
 
        <meta name="csrf-token" content="{{ csrf_token() }}">

            <!-- generate the head meta tags  -->
    {!! SEOMeta::generate() !!}
    <!-- generate the opengraph tags -->
    {!! OpenGraph::generate() !!}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
            <link href="{{ asset('fa/css/font-awesome.css') }}" rel="stylesheet">
   
                     <!-- bootstrap select -->
    <link href="{{ asset('assets/css/gaia.css') }}" rel="stylesheet"/>
        <link rel="stylesheet" href="{{ URL::to('bootstrap-select/css/bootstrap-select.css') }}">

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">    



    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/fonts/pe-icon-7-stroke.css') }}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
        <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
        <div class="container">
            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="/" class="navbar-brand">
                    Internship Space
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-uppercase">
                    <li>
                        <a href="{{route('contact-us')}} " target="_blank">Contact Us</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-share-alt"></i> Share
                        </a>
                        <ul class="dropdown-menu dropdown-danger">
                            <li>
                                <a onclick="window.open(
                    'https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('index')) }}', 'newwindow', 'width=600,height=400'); return false;" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('index')) }}"><i class="fa fa-facebook-square"></i> Facebook</a>
                            </li>
                            <li>
                                <a onclick="window.open('https://twitter.com/intent/tweet?url={{ urlencode(route('index')) }}&text=Heyy, checkout+this+site&hashtags=InternshipSpace,do+your+internship&via=internshipspace', 'newwindow', 'width=600,height=400'); return false;"  href="https://twitter.com/intent/tweet?url={{ urlencode(route('index')) }}&text=Heyy, checkout+this+site&hashtags=InternshipSpace,do+your+internship&via=internshipspace" target="_blank"><i class="fa fa-twitter"></i> Twitter</a>
                            </li>
                            <li>
                                <a onclick="window.open('https://plus.google.com/share?url={{ urlencode(route('index')) }}', 'newwindow', 'width=600,height=400'); return false;" href="https://plus.google.com/share?url={{ urlencode(route('index')) }}" target="_blank"><i class="fa fa-google-plus"></i> Google Plus</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                       
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>


    <div class="section section-header">
        <div class="parallax filter filter-color-blue">
            <div class="image"
                style="background-image: url('assets/img/header-11.jpg')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="title-area">
                      
                        <h1>Internship Space</h1>
                        <h3>Build your skill with industrial standard by doing internships in </h2>
                        <div class="separator line-separator">♦</div>

                    </div>

                    <div class="button-get-started">
                         <form method="get" action="/search">
                <div class="row">
                    <div id="search" class="form-group {{ $errors->has('country') || $errors->has('city') || $errors->has('state') ? ' has-error' : '' }}">
                        {!! csrf_field() !!}

                        <div  class="col-md-5 col-sm-12">
                        
                        <input type="text" name="search" class="form-control" placeholder="company type or field of specialty">
                           <span > search keyword </span>
                        </div>
                        
                        <div class="col-md-2 col-sm-6 {{ $errors->has('country') ? ' has-error' : '' }}">
                                         <select   class="col-md-12 col-sm-12 form-control selectpicker" data-live-search="true" title="Select " tabindex="10"  name="country" id="country" value="{{ old('country') }}">
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

                    <div class="col-md-2 col-sm-6 {{ $errors->has('state') ? ' has-error' : '' }}">
                        <select class="col-md-12 col-sm-12 form-control selectpicker" data-live-search="true" title="Select State" id="state"  name="state">
                        </select>
                        <center>State <a style="display: inline-block;" href="#" class="cant-find" data-missing="state" >{{-- Can't find my state --}}</a></center>

                        @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>

                        <div class="col-md-2 col-sm-6 col-md-offset-0 col-sm-offset-0 {{ $errors->has('city') ? ' has-error' : '' }}">
                            <select class="col-md-12 col-sm-12 form-control selectpicker" data-live-search="true" title="Select City" id="city"  name="city">
                            </select>
                            <center>Town / City <a style="display: inline-block;" href="#" class="cant-find" data-missing="city" >{{-- Can't find my town --}}</a> </center>
                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-1">
                       
                        <button type="submit" class="btn btn-md btn-fill btn-white btn-block">search</button>
                        </div>
                    </div> 
                </div>
            </form>
                
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="row">
                <div class="title-area">
                    <h2>Our Services</h2>
                    <div class="separator separator-danger">✻</div>
                    <p class="description"> We bring to you an opportunity to get yourself ready for the job market through internship in companies of all domain.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-attention"></i>
                        </div>
                        <h3>Trust</h3>
                        <p class="description">We promise you a new look and more importantly, a new attitude. We build that by getting to know you, your needs and creating the best Solutions for those needs.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-note2"></i>
                        </div>
                        <h3>Content</h3>
                        <p class="description">We Reach out for Companies and get them to agree and provide us with the information we are providing to you and also for them to treate the information they receive from us with greate care and priority</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-network"></i>
                        </div>
                        <h3>Professional</h3>
                        <p class="description">We like to present the youth with proffessional skills, so we make sure we spread the word regarding the availability of the internship locations and our services.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section section-our-team-freebie">
        <div class="parallax filter filter-color-black">
            <div class="image" style="background-image:url('assets/img/header-2.jpeg')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="title-area">
                            <h2>Who We Are</h2>
                            <div class="separator separator-danger">✻</div>
                            <p class="description">We are a team of skilled engineers, we believe that we can transform the world around us by working together, as the saying goes "Your network determines your net worth".</p>
                        </div>
                    </div>

                    <div class="team">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="avatar avatar-danger">
                                                    <img alt="..." class="img-circle" src="assets/img/faces/face_1.jpg"/>
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Dirane</h3>
                                                    <p class="small-text">Co-Founder of Afayi</p>
                                                    <p class="description">I am a Computer Science student from the university of Buea, with a good problem solving skills and software project management</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="avatar avatar-danger">
                                                    <img alt="..." class="img-circle" src="assets/img/faces/face_4.jpg"/>
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Harisu</h3>
                                                    <p class="small-text">Co-Founder of Afayi</p>
                                                    <p class="description">I am a software Engineering student from the university of Buea, with experience in Algorithms, Software design, programming and web disign</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="avatar avatar-danger">
                                                    <img alt="..." class="img-circle" src="assets/img/faces/face_3.jpg"/>
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Afayi</h3>
                                                    <p class="small-text">Marketing Hacker</p>
                                                    <p class="description">Afayi is a startup company consisting of software engineers, Electrical engineers, and other aspect of problem solving in our society.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section section-our-clients-freebie">
        <div class="container">
            <div class="title-area">
                <h5 class="subtitle text-gray">Here are some</h5>
                <h2>Clients Testimonials</h2>
                <div class="separator separator-danger">∎</div>
            </div>

            <ul class="nav nav-text" role="tablist">
                <li class="active">
                    <a href="#testimonial1" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="assets/img/faces/face_5.jpg"/>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#testimonial2" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="assets/img/faces/face_6.jpg"/>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#testimonial3" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="assets/img/faces/face_2.jpg"/>
                        </div>
                    </a>
                </li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="testimonial1">
                    <p class="description">
                        And I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. Now there is only one important color... Green I even had the pink polo I thought I was Kanye I promise I will never let the people down. I want a better life for all!
                    </p>
                </div>
                <div class="tab-pane" id="testimonial2">
                    <p class="description">Green I even had the pink polo I thought I was Kanye I promise I will never let the people down. I want a better life for all! And I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. Now there is only one important color...
                    </p>
                </div>
                <div class="tab-pane" id="testimonial3">
                    <p class="description"> I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. The 'Gaia' team did a great work while we were collaborating. They provided a vision that was in deep connection with our needs and helped us achieve our goals.
                    </p>
                </div>

            </div>

        </div>
    </div>


    <div class="section section-small section-get-started">
        <div class="parallax filter">
            <div class="image"
                style="background-image: url('assets/img/office-1.jpeg')">
            </div>
            <div class="container">
                <div class="title-area">
                    <h2 class="text-white">Do you have something in mind?</h2>
                    <div class="separator line-separator">♦</div>
                    <p class="description"> We are keen and open to feedback and suggestions ! We design our system having our customers(professional skill seekers) in mind and we never disappoint!</p>
                </div>

                <div class="button-get-started">
                    <a href="{{ route('contact-us') }}" class="btn btn-danger btn-fill btn-lg">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
<div class="section section-contact-3" id="contact">
                <div class="contact-container">
                    <div class="address-container add-animation animation-1">
                        <div class="address">
                            <h4>Where to meet ?</h4>
                            <p class="text-gray">
                                 Molyko Buea <br>
                                Southwest, Cameroon
                            </p>
                            <h4>Want to say hello?</h4>
                            <a target="_blank" href="/contact-us"  class="btn btn-black btn-contact">
                                CONTACT US <i class="fa fa-paper-plane"></i>
                            </a>
                            <h4>Thank you for informing Others about us!</h4>


                            <div class="col-md-6">
                                 <button id="facebook" class="btn btn-lg btn-contact btn-block">
                                     <i class="fa fa-facebook-square"></i> Facebook
                                 </button>
                            </div>
                            <div class="col-md-6">
                                <button id="twitter" class="btn btn-lg btn-contact btn-block">
                                    <i class="fa fa-twitter"></i> Twitter
                                </button>
                            </div>
                        </div>
                    </div>
                    <div  class="map">
                        <div id="contactUsMap" class="big-map"></div>
                    </div>
                </div>


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
                <a href="{{route('companies')}}"><small><i class="fa fa-building-o"></i></small> Companies</a>
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
            <div class="center" style="color: white">
                 © <script> document.write(new Date().getFullYear()) </script> Internship Space,made with inspiration
            </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / Footer -->
</body>

<!--   core js files    -->
<script src="{{ URL::to('jquery/jquery2.1.4.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script src="{{ URL::to('bootstrap-select/js/bootstrap-select.js') }}"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="{{ asset('assets/js/modernizr.js') }}"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<!-- <script type="text/javascript" src="{{ asset('assets/js/rubick_pres.js') }}"></script> -->

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="{{ asset('assets/js/gaia.js') }}"></script>

</html>