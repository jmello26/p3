
@extends('main')

@section('title')
	Lorem Ipsum Generator
@stop

@section('content')
	<a href='/'>{{ HTML::image('/images/p3.png', 'Site Logo'); }}</a>
	<h1>Lorem Ipsum Generator</h1>

	{{ Form::open (array( 'url' => '/lorem', 'method' => 'POST')) }}
		{{ Form::label('num_paras', 'Number of paragraphs:') }}
		{{ Form::text('num_paras'); }} 
		{{ Form::submit('Get text!'); }}
	
	{{ Form::close() }}
	
	@if (isset($result))
		{{ $result }}
	@endif
	
@stop