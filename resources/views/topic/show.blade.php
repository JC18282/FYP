@extends ('layouts.master')

@section ('content')
<div class="container">
	<h1>{{ $topic->title }}</h1>
	<br>
	<p>{{ $topic->content }}</p>
</div>
@endsection
