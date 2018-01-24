@extends('layouts.email')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
    	<h3 class="panel-title">{{ $mailContent->title }} </h3>
    </div>
  <div class="panel-body">
    {{ $mailContent->body }}
  </div>
  <div class="panel-footer"><a href="{{$mailContent->url }}" class="btn btn-primary">View Details</a></div>
</div>

@endsection