
<form>

	<div class="row">
        	<div class="form-group {{ $errors->has('country') || $errors->has('city') || $errors->has('state') ? ' has-error' : '' }}">
        		{!! csrf_field() !!}

                <div  class="col-md-2 col-sm-4">
                
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
        	</div> 
    </div>


        <div class="col-xs-12 col-sm-6 col-md-3">
        	<span class="links"> &nbsp</span>
        	<button  class="btn btn-lg btn-primary">submit</button>
        </div>
       
</form>



<div class="row">
	
	<div class="col col-md-8"> Map</div>
</div>