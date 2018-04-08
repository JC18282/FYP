@extends ('layouts.master')

@section ('content')
	<h1>{{ $topic->title }}</h1>
	<br>
	<p>{{ $topic->content }}</p>
@endsection
