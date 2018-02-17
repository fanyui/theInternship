@extends('layouts.front')

@section('content')
	<section id="aa-property-header" style="background-image: url('front/img/property-header-bg.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-6">
        <div class="aa-property-header-inner">
          <h2>List of Companies</h2>
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

@section('content')
<div class="container">
  <div class="row">
    <h2 class="lead"><strong class="text-danger">{{$count}}</strong> results were found </h2>
    <div class="col col-md-8">
      
  
      @if(count($companies)>0)
        @foreach($companies as $company)
          <a href="{{ route('search-details',['slug' => $company->id ]) }} " target="_blank"> <h3> {{ $company->name }}</h3></a>

          <p>{{ substr($company->description, 0, 300) }} 
            <a href="{{ route('search-details',['slug' => $company->id ]) }} "> view more</a>
          </p>
        @endforeach
      @else
        <h2>No results were found</h2>
      @endif
    </div>
    <div class="col col-md-4">
      
    </div>

    
    
    
  </div>
    <div class="" align="center">
            {{$companies->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
        </div>
</div>

@endsection