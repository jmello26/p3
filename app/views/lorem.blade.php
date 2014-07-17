@extends('main')

@section('title')
	Lorem Ipsum Generator
@stop

@section('content')
	{{-- Clickable image to bring users back to the main page --}}
	<a href='/'>{{ HTML::image('/images/p3.png', 'Main Page'); }}</a>
	
	<h1>Lorem Ipsum Generator</h1>

	{{-- POST the value from the text box up to this page again --}}	
	{{ Form::open (array( 'url' => '/lorem', 'method' => 'POST')) }}
		{{ Form::label('num_paras', 'Number of paragraphs:') }}
		{{ Form::text('num_paras'); }} 
		{{ Form::submit('Get text!'); }}
	{{ Form::close() }}
	
	<br/><br/>
	
	{{-- If we have a result (from a POST), display it --}}
	@if (isset($result))
		{{ $result }}
	@endif
	
@stop