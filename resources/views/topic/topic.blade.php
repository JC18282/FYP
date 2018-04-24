<div class="card">
	<img class="card-img-top" src="/images/{{ $topic->image }}" alt="Card image cap">
	<div class="card-body">
		<h5 class="card-title">{{ $topic->title }}</h5>
    	<p class="card-text">{{ $topic->description }}</p>
    	<a href="/topic/{{ $topic->id }}" class="btn btn-primary">View Topic</a>
    	<a href="/topic/{{ $topic->id }}/quiz" class="btn btn-primary">Take Quiz</a>
	</div>
</div>
