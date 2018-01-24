@extends('layouts.app')

@section('content')
<section id="aa-properties" style="background: #f6f6f6;">
  <div class="container">
    <div class="row">
		<div class="col col-xs-12 col-sm-6 col-md-8 col-lg-8">
		<div class="blog-header">
	        <h1 class="blog-title">{{ $company->name }}</h1>
			<span> <img src="{{ $company->logo }}" alt="{{ $company->logo }}" class="img-circle"></span>
	        <span>Email: {{ $address->email }} </span><br>
	        <span>Tel: {{ $address->telephone }} </span><br>
	        <span>Country: {{ $address->country->name }} </span><br>
	        <span>Internship Duration {{ $company->duration }} </span><br>
	        <span>Application period {{ $company->application_period }} </span><br>
	        <span>Number of Interns: {{ $company->intern_number }} </span><br>
			<span><a href="http://{{ $company->website}}" target="blank">{{ $company->website }} </a> </span>
	        <hr>
      	</div>
	
			<center><h3 class="center"> Company Details </h3></center>
			<p>{{ $company->description }}</p>
			
		</div>
		
		<div class="col col-xs-6 col-md-4 col-lg-4">
			<h2>Map</h2>
			<div style="width: 500px; height: 500px;">
				{!! Mapper::render() !!}
			</div>
			<h1> Related companies </h1>
				<!-- <p> {{ $address }} </p> -->
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		
		{{-- @foreach($CompanyHasCategories as $CompanyHasCategory)
							{{ $CompanyHasCategory->category->name }}
						@endforeach --}}
		</div>
		
	</div>
</div>	
</section>
@endsection