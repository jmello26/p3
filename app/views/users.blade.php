@extends('main')

@section('title')
	Random User Generator
@stop

@section('content')
	{{-- Clickable image to bring users back to the main page --}}
	<a href='/'>{{ HTML::image('/images/p3.png', 'Main Page'); }}</a>
	
	<h1>Random User Generator</h1>

	{{-- POST the value from the text box up to this page again --}}	
	{{ Form::open (array( 'url' => '/users', 'method' => 'POST')) }}
		{{ Form::label('num_users', 'Number of users:') }}
		{{ Form::text('num_users'); }} 
		{{ Form::submit('Get Users!'); }}
	{{ Form::close() }}
	
	<br/><br/>
	
	{{-- If we have a result (from a POST), display it --}}
	@if (isset($result))
		{{ $result }}
	@endif
@stop