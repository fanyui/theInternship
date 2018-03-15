@extends('layouts.app-search')

@section('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">    
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="container">
	<div class="row">
		<h2 class="lead"><strong class="text-danger">{{count($companies)}}</strong> @lang('sentence.result_found') </h2>
		<div class="col col-md-8">
			
	
			@if(count($companies)>0)
				@foreach($companies as $company)
					<a href="{{ route('search-details',['slug' => $company->id ]) }} " target="_blank"> <h3> {{ $company->name }}</h3></a>

					<p>{{ substr($company->description, 0, 300) }} 
						<a href="{{ route('search-details',['slug' => $company->id ]) }} "> @lang('sentence.view_more')</a>
					</p>
				@endforeach
			@else
				<h2>@lang('sentence.no_result_found')</h2>
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
