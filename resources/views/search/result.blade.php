@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">    
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="container">
	<div class="row">
		
	

				@foreach($companies as $company)
					<a href="{{ route('search-details',['slug' => $company->id ]) }} " target="_blank"> <h3> {{ $company->name }}</h3></a>

					<p>{{ substr($company->description, 0, 300) }} 
						<a href="{{ route('search-details',['slug' => $company->id ]) }} "> view more</a>
					</p>
				@endforeach

		
		
		
	</div>

</div>
@endsection
