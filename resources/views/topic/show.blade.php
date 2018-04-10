@extends ('layouts.master')

@section ('content')
<div class="container">
	<h1>{{ $topic->title }}</h1>
	<br>
	<p>{{ $topic->content }}</p>
	<br>


	<h4>{{ $topic->quiz['title'] }}</h4>
	<br>
	<p>{{ $topic->quiz['description'] }}

	@foreach ($topic->quiz->question as $question)
	<h5>{{ $question->question }}</h5>
	<br>
	<ul>
		@foreach ($question->awnser as $awnser)
			<li>{{ $awnser['body'] }}</li>
		@endforeach
	</ul>
	@endforeach


</div>
@endsection
