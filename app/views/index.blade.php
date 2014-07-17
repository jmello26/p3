@extends('main')

@section('title')
	Developer's Best Friend
@stop

@section('content')
	<a href='/'>{{ HTML::image('/images/p3.png', 'Site Logo'); }}</a>
	<h1>Developer's Best Friend</h1>

	<blockquote>This site provides two tools that developers may find useful.  The first will generate paragraphs of generic "lorem ipsum"
	text, which can be used as a placeholder for real text in a site.  The second tool is a random user generator.<br/><br/>
	
	{{ HTML::link('/lorem', 'Lorem Ipsum Generator'); }} <br/>
	{{ HTML::link('/users', 'Random User Generator'); }}
	</blockquote>
@stop
