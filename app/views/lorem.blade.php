
@extends('main')

@section('title')
	Lorem Ipsum Generator
@stop

@section('content')
	<h1>Lorem Ipsum Generator</h1>

	{{ Form::open (array( 'url' => '/lorem', 'method' => 'POST')) }}
		{{ Form::label('num_paras', 'Number of paragraphs:') }}
		<br/>
		{{ Form::text('num_paras'); }} 
		{{ Form::submit('Get text!'); }}
	
	{{ Form::close() }}
	
	@if (isset($result))
		{{ $result }}
	@endif
	
@stop