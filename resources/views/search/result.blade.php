@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">    
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col col-xs-12 col-sm-6 col-md-3 col-lg-3">
		something i don't know how to say about something i don't know how to say aboutsomething i don't know how to say aboutsomething i don't know how to say aboutsomething i don't know how to say aboutsomething i don't know how to say about
		</div>

		<div class="col col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
			@foreach($companies as $company)
				<h3> {{ $company->name }}</h3>

				<p>{{ substr($company->description, 0, 300) }} 
					<a href="{{ route('search-details',['slug' => $company->id ]) }} "> view more</a>
				</p>
			@endforeach
		</div>
		
		<div class="col col-xs-12 col-sm-6 col-md-3 col-lg-3">
		 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
		
	</div>

</div>
@endsection
