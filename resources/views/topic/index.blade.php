@extends ('layouts.master')

@section ('content')
<div class="container">

	@foreach ($topics as $topic)
		<div class="row">
			@include ('topic.topic')
		</div>
	@endforeach

</div>
@endsection