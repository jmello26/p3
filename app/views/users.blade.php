@extends('main')

@section('title')
	Random User Generator
@stop

@section('content')
	<h1>Random User Generator</h1>

	{{ Form::open (array( 'url' => '/users', 'method' => 'POST')) }}
		{{ Form::label('num_users', 'Number of users:') }}
		<br/>
		{{ Form::text('num_users'); }} 
		{{ Form::submit('Submit!'); }}
	
	{{ Form::close() }}
	
	@if (isset($result))
		{{ $result }}
	@endif
@stop