@extends('layouts.front')

@section('content')
	<section id="aa-property-header" style="background-image: url('front/img/property-header-bg.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
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

	                    <div  class="col-md-2 col-sm-4">
	                    
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
	                    <div class="col-xs-12 col-sm-6 col-md-3">
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
      <div class="col-md-8">
      		<div class="panel panel-info sm">
                    <div class="panel-heading">
                        <div class="panel-title"><h4><i class="fa fa-list"></i> {{$company->name}} Info</h4></div>
                    </div>
                    <div class="panel-body an-slideinleft">
						<span> <img src="{{ $company->logo }}" alt="{{ $company->logo }}" class="img-circle"></span><br>
				        <span>Email: {{ $address->email }} </span><br>
				        <span>Tel: {{ $address->telephone }} </span><br>
				        <span>Country: {{ $address->country->name }} </span><br>
				        <span>Internship Duration {{ $company->duration }} </span><br>
				        <span>Application period {{ $company->application_period }} </span><br>
				        <span>Number of Interns: {{ $company->intern_number }} </span><br>
						<span><a href="http://{{ $company->website}}" target="blank">{{ $company->website }} </a> </span>
				        <hr>
                <span class="pull-right"> <a href="{{route('media',['slug' => $company->id])}} " class="btn btn-primary"> Apply Now!!!</a></span>
				    </div>
			</div>
		      	
	
			<center><h3 class="center"> Company Description </h3></center>
			<p>{{ $company->description }}</p>
      </div>
      <div class="col-md-4">
        <div class="aa-properties-single-sidebar">
        	<h2>Map</h2>
        	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
                 <li class="share twitter"><a  onclick="window.open('https://twitter.com/intent/tweet?url={{urlencode(route('search-details',['slug' => $company->id]) )}} &text=Heyy, checkout+this+new+internship+offer&hashtags=theinternship,&via=theinternship', 'newwindow', 'width=600,height=400'); return false;"  href="https://twitter.com/intent/tweet?url=&text=Heyy, checkout+this+new+internship+offer&hashtags=theinternship,&via=theinternship" target="_blank"><i class="fa fa-twitter"></i></a>
                 </li>
                 <li class="share google-plus">
                  <a onclick="window.open('https://plus.google.com/share?url={{urlencode(route('search-details',['slug' => $company->id]) )}}', 'newwindow', 'width=600,height=400'); return false;" href="https://plus.google.com/share?url={{urlencode(route('search-details',['slug' => $company->id]) )}}" target="_blank"><i class="fa fa-google-plus"></i></a>
                 </li>
                 <li class="share whatsapp"><a href="whatsapp://send?text=Heyyy, checkout this internship offer on theinternship "><i class="fa fa-whatsapp"></i> </a></li>
               </ul>
              </div>
           </div>
         </div>
      </div>
    </div>
  </div>
</section>
@endsection