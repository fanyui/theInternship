<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Internship Space') }}</title>

    <!-- Styles -->

    @yield('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- bootstrap select -->
    <link rel="stylesheet" href="{{ URL::to('bootstrap-select/css/bootstrap-select.css') }}">
    <link href="{{ URL::to('fa/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Internship Space') }}
                    </a>
                </div>
                <br>
                <section id="aa-advance-search">
  <div class="container" id="home-page-search">
    <div class="aa-advance-search-area">
      <div class="form">
       <div class="aa-advance-search-top">
         <form method="get" action="/search">
                <div class="row">
                    <div id="search" class="form-group {{ $errors->has('country') || $errors->has('city') || $errors->has('state') ? ' has-error' : '' }}">
                        {!! csrf_field() !!}

                        <div  class="col-md-5 col-sm-12">
                        
                        <input type="text" name="search" class="form-control" placeholder="company type or field of specialty">
                          
                        </div>
                        
                        <div class="col-md-2 col-sm-6 {{ $errors->has('country') ? ' has-error' : '' }}">
                                         <select   class="col-md-12 col-sm-12 form-control selectpicker" data-live-search="true" title="country " tabindex="10"  name="country" id="country" value="{{ old('country') }}">
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

                    <div class="col-md-1 col-sm-6 {{ $errors->has('state') ? ' has-error' : '' }}">
                        <select class="col-md-12 col-sm-12 form-control selectpicker" data-live-search="true" title="Select State" id="state"  name="state">
                        </select>
                       
                        @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>

                        <div class="col-md-1 col-sm-6 col-md-offset-0 col-sm-offset-0 {{ $errors->has('city') ? ' has-error' : '' }}">
                            <select class="col-md-12 col-sm-12 form-control selectpicker" data-live-search="true" title="Select City" id="city"  name="city">
                            </select>
                            
                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-1">
                        <button type="submit" class="btn btn-md btn-primary">search</button>
                        </div>
                    </div> 
                </div>
            </form>
       </div>

   
      </div>
    </div>
  </div>
</section>
            </div>
        </nav>

        @yield('content')
    </div>

   

     @include('modals')
 @yield('footer')
    <!-- Scripts -->
    <script src="{{ URL::to('jquery/jquery2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- bootstrap select -->
    <script src="{{ URL::to('bootstrap-select/js/bootstrap-select.js') }}"></script>

</body>
</html>
