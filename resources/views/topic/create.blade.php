@extends ('layouts.master')

@section ('content')
<div class="container">
	<div class="col-sm-12">
		<h1>Create a New Topic</h1>
		<hr>

		<p>Use the from below to create a new topic for the LMS.</p>
		<form method="POST" action="/topic">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Topic Title</label>
			    <input type="text" class="form-control" id="title" name="title">
			</div>

			<div class="form-group">
			    <label for="Content">Content</label>
			    <textarea id="content" name="content" class="form-control"></textarea>
			</div>

			@include ('layouts.error')

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Create</button>
			</div>

		</form>





	</div>

</div>
<!-- required="required" -->
@endsection
