@extends ('layouts.master')

@section ('content')
<div class="container">

	<div class="row">
		<div class="col-12">
			<div class="card-deck">
		    
				@foreach ($topics as $topic)

				    <div class="card" style="width: 18rem;">
						<img class="card-img-top" src="/images/{{ $topic->image }}" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">{{ $topic->title }}</h5>
					    	<p class="card-text">{{ $topic->content }}</p>
					    	<a href="/topic/{{ $topic->id }}" class="btn btn-primary">View Topic</a>
						</div>
					</div>


				@endforeach

			</div>
		</div>

	</div>
</div>
@endsection