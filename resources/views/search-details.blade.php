@extends('layouts.front')

@section('content')
	<section id="aa-property-header" style="background-image: url('front/img/property-header-bg.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-6">
        <div class="aa-property-header-inner">
          <h2>Company Details</h2>
          <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">THEINTERNSHIP</a></li>   
          
        </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container front-alert">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <div class="col-md-12 alert alert-{{ $msg }}" align="center">{!! Session::get('alert-' . $msg) !!} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
      @endif
    @endforeach
  </div>
</section> 

<!-- Advance Search -->
{{----}}
<section id="aa-advance-search">
  <div class="container" id="home-page-search">
    <div class="aa-advance-search-area">
      <div class="form">
       <div class="aa-advance-search-top">
         <form method="get" action="/search">
                <div class="row">
                	<div class="form-group {{ $errors->has('country') || $errors->has('city') || $errors->has('state') ? ' has-error' : '' }}">
                		{!! csrf_field() !!}

	                    <div  class="col-md-4 col-sm-4">
	                    
	                    <input type="text" name="search" class="form-control" placeholder="company type or field of specialty">
	                      
                        </div>
	                    
	                    <div class="col-md-2 col-sm-4 {{ $errors->has('country') ? ' has-error' : '' }}">
                                         <select   class="col-md-12 form-control selectpicker" data-live-search="true" title="country " tabindex="10"  name="country" id="country" value="{{ old('country') }}">
                            @if ($countries->count())
                                @foreach($countries as $country)
                                             <option value="{{$country->id}}" {{ old('country') == $country->id ? 'selected' : null }} > {{ $country->name}} </option>
                                @endforeach
                            @endif
                        </select>
                        
                        @if ($errors->has('country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div> 

                    <div class="col-md-2 col-sm-5 {{ $errors->has('state') ? ' has-error' : '' }}">
                        <select class="col-md-12 form-control selectpicker" data-live-search="true" title="Select State" id="state"  name="state">
                        </select>
                       
                        @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>

                        <div class="col-md-2 col-sm-4 col-md-offset-0 col-sm-offset-2 {{ $errors->has('city') ? ' has-error' : '' }}">
                            <select class="col-md-12 form-control selectpicker" data-live-search="true" title="Select City" id="city"  name="city">
                            </select>
                            
                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
	                    <div class="col-xs-12 col-sm-6 col-md-2">
	                    	<span class="links"> &nbsp</span>
	                    <button type="submit" class="btn btn-lg btn-primary">search</button>
	                    </div>
                	</div> 
                </div>
            </form>
       </div>

   
      </div>
    </div>
  </div>
</section>
{{----}}
<!-- / Advance Search -->
<section id="aa-properties" style="background: #f6f6f6;">
  <div class="container">
  	<section id="aa-latest-property" class="an-fadein">
  <div class="container">
	<hr>
	</div>
</section>
    <div class="row">
    	
      {{-- Listing head info (operation, slider, location, headline, price) --}}
      <div class="col-md-8 col-sm-12">
      		<div class="panel panel-info sm">
                    <div class="panel-heading">
                        <div class="panel-title"><h4><i class="fa fa-list"></i> {{$company->name}} Info</h4></div>
                    </div>
                    <div class="panel-body an-slideinleft">
						<span class="pull-right"> <img src="{{asset('uploads/company/logo/'. $company->logo) }}" alt="{{ $company->logo }}" class="img-circle" width="100" height="100"></span><br>
				        <span>Email: <b>{{ $address->email }}</b> </span><br>
				        <span>Tel: <b>{{ $address->telephone }}</b> </span><br>
				        <span>Country: <b>{{ $address->country->name }}</b> </span><br>
				        <span>Internship Duration: <b>{{ $company->duration }} (months)</b> </span><br>
				        <span>Application Start period: <b>{{ $company->application_period }}</b> </span><br>
                <span>Application End period: <b>{{ $company->application_end_period }}</b> </span><br>
				        <span>Number of Interns: <b>{{ $company->intern_number }}</b> </span><br>
						<span><a href="http://{{ $company->website}}" target="blank">{{ $company->website }} </a> </span>
				        <hr>
                <span class="pull-right"> <a href="{{route('media',['slug' => $company->id])}} " class="btn btn-primary"> Apply Now!!!</a></span>
				    </div>
			</div>
		      	
	
			<center><h3 class="center"> Company Description </h3></center>
			<p>{{ $company->description }}</p>
      @if($company->images)
      <h2>A Feel of what is looks like at <i>{{$company->name}}</i></h2>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="{{asset('uploads/company/logo/'. $company->logo) }}" alt="logo">
              <div class="carousel-caption">
                {{$company->name }}
              </div>
            </div>
            @foreach($company->images as $image)
            <div class="item">
              <img 
                       src="{{ asset($image->thumbnail_img) }}"  
                       img-mobile="{{ asset($image->img_path) }}" 
                       img-tablet="{{ asset($image->img_path) }}" 
                       img-full="{{ asset($image->img_path) }}" 
                      class="progressive-image">
              <div class="carousel-caption">
               {{$company->name }}
              </div>
            </div>
            @endforeach
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
            
      @endif
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="aa-properties-single-sidebar">
        	<h2>Map</h2>
        	<div style="width: 350px; height: 400px;">
            {!! Mapper::render() !!}
          </div>
        </div>

        <div class="aa-properties-social">
           <div class="panel panel-default">
             <div class="panel-heading"> 
              <h2>Share</h2>
             </div>
             <div class="panel-body">
               <ul>
                 <li class="share facebook">
                  <a onclick="window.open(
                    'https://www.facebook.com/sharer/sharer.php?u={{urlencode(route('search-details',['slug' => $company->id]) )}} ', 'newwindow', 'width=600,height=400'); return false;" href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(route('search-details',['slug' => $company->id]) )}}"><i class="fa fa-facebook"></i></a>
                 </li>
                 <li class="share twitter"><a  onclick="window.open('https://twitter.com/intent/tweet?url={{urlencode(route('search-details',['slug' => $company->id]) )}} &text=Heyy, checkout+this+new+internship+offer&hashtags=internshipspace,&via=internshipspace', 'newwindow', 'width=600,height=400'); return false;"  href="https://twitter.com/intent/tweet?url=&text=Heyy, checkout+this+new+internship+offer&hashtags=internshipspace,&via=internshipspace" target="_blank"><i class="fa fa-twitter"></i></a>
                 </li>
                 <li class="share google-plus">
                  <a onclick="window.open('https://plus.google.com/share?url={{urlencode(route('search-details',['slug' => $company->id]) )}}', 'newwindow', 'width=600,height=400'); return false;" href="https://plus.google.com/share?url={{urlencode(route('search-details',['slug' => $company->id]) )}}" target="_blank"><i class="fa fa-google-plus"></i></a>
                 </li>
                 <li class="share whatsapp"><a href="whatsapp://send?text=Heyyy, checkout this internship offer on internshipspace "><i class="fa fa-whatsapp"></i> </a></li>
               </ul>
              </div>
           </div>
         </div>
      </div>
    </div>
  </div>
</section>
@endsection