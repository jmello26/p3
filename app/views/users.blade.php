@extends('main')

@section('title')
	Random User Generator
@stop

@section('content')
	<a href='/'>{{ HTML::image('/images/p3.png', 'Site Logo'); }}</a>
	<h1>Random User Generator</h1>

	{{ Form::open (array( 'url' => '/users', 'method' => 'POST')) }}
		{{ Form::label('num_users', 'Number of users:') }}
		{{ Form::text('num_users'); }} 
		{{ Form::submit('Get Users!'); }}
	
	{{ Form::close() }}
	
	@if (isset($result))
		{{ $result }}
	@endif
@stop