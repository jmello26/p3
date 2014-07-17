@extends('main')

@section('title')
	Developer's Best Friend
@stop

@section('content')
	<h1>Developer's Best Friend</h1>

	{{ Form::open (array( 'url' => '/', 'method' => 'POST')) }}
		{{ Form::label('dev_tool', 'Select a tool:') }}
		<br/>
		{{ Form::radio('dev_tool', 'lorem'); }} Lorem Ipsum text generator
		{{ Form::radio('dev_tool', 'users'); }} Random User generator
		<br/>
		{{ Form::submit('Submit!'); }}
	
	{{ Form::close() }}
@stop
