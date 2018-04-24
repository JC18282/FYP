@extends ('layouts.master')

@section ('content')
<div class="container">
	<div class="col-sm-12">
		<h1>Create a New Topic</h1>
		<hr>

		@include ('layouts.error')

		<p>Use the from below to create a new topic for the LMS.</p>
		<form method="POST" action="/topic" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Topic Title</label>
			    <input type="text" class="form-control" id="title" name="title">
			</div>

			<div class="form-group">
			    <label for="description">Description</label>
			    <input type="text" id="description" name="description" class="form-control">
			</div>

			<div class="form-group">
			    <label for="content">Content</label>
			    <textarea id="summernote" name="content" class="form-control" rows="40"></textarea>
			</div>

			<div class="form-group">
			    <label for="topicImage">Topic Image</label>
			    <input type="file" name="topicImage" id="topicImage">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Create</button>
			</div>

		</form>

	</div>

</div>
<script>
	$(document).ready(function() {
		$('#summernote').summernote({
			placeholder: 'Insert content here..',
        	tabsize: 2,
       		height: 250
		});
	});
</script>
@endsection