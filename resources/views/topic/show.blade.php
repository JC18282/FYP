@extends ('layouts.master')

@section ('content')
<div class="container">
	<h1>{{ $topic->title }}</h1>
	<br>
	{!! $topic->content !!}
</div>
@endsection
