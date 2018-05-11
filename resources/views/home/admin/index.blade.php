@extends('layouts.master')

@section('content')
<div class="container">

<h1>Topics</h1>
<table class="table">
  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Title</th>
	      <th scope="col">Description</th>
	      <th scope="col">Options</th>
	    </tr>
	</thead>
	<tbody>
		@foreach ($topics as $topic)
			<tr>
		      	<th scope="row">{{ $topic->id }}</th>
		      	<td>{{ $topic->title }}</td>
		      	<td>{{ $topic->description }}</td>
		      	<td>
		      		<a href="#" class="btn btn-primary">Edit Content</a>
		      		<a href="/quiz/{{ $topic->quiz->id }}" class="btn btn-primary">Edit Quiz</a>
		      		<a href="#" class="btn btn-primary">Edit Image Header</a>
		      		<a href="#" class="btn btn-danger">Delete</a>
		      	</td>
	    	</tr>
		@endforeach
		<tr>
			<td><a href="#" class="btn btn-primary">Add Topic</a></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>

</div>
@endsection

