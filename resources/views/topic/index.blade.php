@extends ('layouts.master')

@section ('content')
<div class="container">

	<div class="row">
		<div class="col-12">
			<div class="card-deck">
		    
				@foreach ($topics as $topic)

					@include ('topic.topic')

				@endforeach

			</div>
		</div>

	</div>
</div>
@endsection