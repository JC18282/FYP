@extends ('layouts.master')

@section ('content')
<div class="container">	

	<h1>{{ $quiz->description }}</h1>


	@foreach ($questions as $question)
		<h2>{{ $question->question }}</h2>
		<br>
		<ul>
		@foreach ($question->awnsers as $awnser)
			<li>{{ $awnser->body }}</li>
		@endforeach
		</ul>

	@endforeach

</div>
@endsection