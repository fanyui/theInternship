
<div class="row">
	
	<div class="col col-md-4">
			<div style="width: 400px; height: 400px;">
        {!! Mapper::render() !!}
      </div>
		<!-- beginning of longitude and latitude code -->
		<div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
            <label for="longitude" class="col-md-4 control-label">Longitude</label>

            <div class="col-md-6">
                <input id="longitude" type="text" class="form-control" name="longitude" value="{{ old('longitude') }}" >

                @if ($errors->has('longitude'))
                    <span class="help-block">
                        <strong>{{ $errors->first('longitude') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
            <label for="latitude" class="col-md-4 control-label">Latitude</label>

            <div class="col-md-6">
                <input id="latitude" type="text" class="form-control" name="latitude" value="{{ old('latitude') }}" >

                @if ($errors->has('latitude'))
                    <span class="help-block">
                        <strong>{{ $errors->first('latitude') }}</strong>
                    </span>
                @endif
            </div>
        </div>

	</div>

	<!-- Longitude and latitude for the map ends here -->

	<div class="col col-md-8">
		<div class="row">
			<div class="center">	
	        	<div class="form-group {{ $errors->has('country') || $errors->has('city') || $errors->has('state') ? ' has-error' : '' }}">
	        		{!! csrf_field() !!}
	                
	                <div class="col-md-2 col-sm-4 col-md-offset-2 col-sm-offset-2 {{ $errors->has('country') ? ' has-error' : '' }}">
				        <select   class="col-md-12 form-control selectpicker" data-live-search="true" title="Select Country" tabindex="10"  name="country" id="country" value="{{ old('country') }}" required >
				            @if ($countries->count())
				                @foreach($countries as $country)
				                    <option value="{{$country->id}}" {{ old('country') == $country->id ? 'selected' : null }} > {{ $country->name}} </option>
				                @endforeach
				            @endif
				        </select>
				        <center>Country <a  href="#" class="cant-find" data-missing="country" >{{-- Can't find my country --}}</a></center>

				        @if ($errors->has('country'))
				            <span class="help-block">
				                <strong>{{ $errors->first('country') }}</strong>
				            </span>
				        @endif
				    </div> 

				    <div class="col-md-2 col-sm-5 {{ $errors->has('state') ? ' has-error' : '' }}">
				        <select class="col-md-12 form-control selectpicker" data-live-search="true" title="Select State" id="state"  name="state">
				        </select>
				        <center>State <a  href="#" class="cant-find" data-missing="state" >{{-- Can't find my state --}}</a></center>

				        @if ($errors->has('state'))
				            <span class="help-block">
				                <strong>{{ $errors->first('state') }}</strong>
				            </span>
				        @endif
				    </div>

				    <div class="col-md-2 col-sm-4 col-md-offset-0 col-sm-offset-3 {{ $errors->has('city') ? ' has-error' : '' }}">
				        <select class="col-md-12 form-control selectpicker" data-live-search="true" title="Select City" id="city"  name="city">
				        </select>
				        <center>Town / City <a  href="#" class="cant-find" data-missing="city" >{{-- Can't find my town --}}</a> </center>
				        @if ($errors->has('city'))
				            <span class="help-block">
				                <strong>{{ $errors->first('city') }}</strong>
				            </span>
				        @endif
				    </div>
	        	</div> 
	        </div>
	    </div>
	    <br>
	    {{-- category  display --}}
	    <div class="row">
	    	<div class="col-md-2 col-sm-4 col-md-offset-2 col-sm-offset-2 {{ $errors->has('category') ? ' has-error' : '' }}">
		        <select   class="col-md-12 form-control selectpicker" data-live-search="true" title="Select " tabindex="10"  name="category" id="category" value="{{ old('category') }}" required="">
		            @if ($categories->count())
		                @foreach($categories as $category)
		                    <option value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : null }} > {{ $category->name}} </option>
		                @endforeach
		            @endif
		        </select>
		        <center>Category <a  href="#" class="cant-find" data-missing="country" >{{-- Can't find my category --}}</a></center>

		        @if ($errors->has('category'))
		            <span class="help-block">
		                <strong>{{ $errors->first('category') }}</strong>
		            </span>
		        @endif
		    </div> 
	    </div>
	    <br>

	    <div class="row"> 
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

	            <div class="col-md-6">
	                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required >

	                @if ($errors->has('email'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('email') }}</strong>
	                    </span>
	                @endif
	            </div>
	        </div>

	        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
	            <label for="telephone" class="col-md-4 control-label">Telephone</label>

	            <div class="col-md-6">
	                <input id="telephone" type="number" class="form-control" name="telephone" required>

	                @if ($errors->has('telephone'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('telephone') }}</strong>
	                    </span>
	                @endif
	            </div>
	        </div>
	    </div>
	    
	    
    </div>

</div>
<div class="row">
	<div class="col-md-6  pull-left">
	        <a href="#add-company" data-toggle="tab" class="btn btn-warning col-md-6 nav-btn-next-prev" data-move="prev" data-current="info"  data-next-prev="property">
	            <i class="fa fa-btn fa-backward"></i>Previous
	        </a>
	    </div>

	        <div class="col-md-6 pull-right">
	        	<a class="btn btn-info col-md-6   nav-btn-next-prev" href="#add-logo" data-toggle="tab" data-move="next" data-current="address"  data-next-prev="logo">
            	<i class="fa fa-btn fa-forward"></i>Next
        		</a>
	        </div>
</div>