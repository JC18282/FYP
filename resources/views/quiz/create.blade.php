@extends ('layouts.master')

@section ('content')
<div class="container">
	<div class="col-sm-12">

		<div class="alert alert-success" role="alert">
		  <strong>Success!</strong> You successfully created a new topic.
		</div>

		<h1>Create Quiz for {{ $topic->title }}</h1>
		<hr>

		<p>Use the from below to create a new quiz for {{ $topic->title }}</p>
		<form method="POST" action="/topic/{{ $topic->id }}/quiz">
			{{ csrf_field() }}

			<div class="form-group">
					<label for="question1">Question 1:</label>
				    <input type="text" class="form-control" id="question1" name="question1">

				    <label for="question1awnser1">Awnser 1:</label>
				    <input type="text" class="form-control" id="question1awnser1" name="question1awnser1">


					<label for="question1awnser2">Awnser 2:</label>
				    <input type="text" class="form-control" id="question1awnser2" name="question1awnser2">


					<label for="question1awnser3">Awnser 3:</label>
				    <input type="text" class="form-control" id="question1awnser3" name="question1awnser3">

				   	<label for="question1correctawnser">Correct Awnser:</label>
				    <select class="form-control" id="question1correctawnser" name="question1correctawnser">
					    <option>1</option>
					    <option>2</option>
					    <option>3</option>
					</select>
			</div>

			<div class="form-group">
					<label for="question2">Question 2:</label>
				    <input type="text" class="form-control" id="question2" name="question2">

				    <label for="question2awnser1">Awnser 1:</label>
				    <input type="text" class="form-control" id="question2awnser1" name="question2awnser1">


					<label for="question2awnser2">Awnser 2:</label>
				    <input type="text" class="form-control" id="question2awnser2" name="question2awnser2">


					<label for="question2awnser3">Awnser 3:</label>
				    <input type="text" class="form-control" id="question2awnser3" name="question2awnser3">

				   	<label for="question2correctawnser">Correct Awnser:</label>
				    <select class="form-control" id="question2correctawnser" name="question2correctawnser">
					    <option>1</option>
					    <option>2</option>
					    <option>3</option>
					</select>

			</div>

			<div class="form-group">
					<label for="question3">Question 3:</label>
				    <input type="text" class="form-control" id="question3" name="question3">

				    <label for="question3awnser1">Awnser 1:</label>
				    <input type="text" class="form-control" id="question3awnser1" name="question3awnser1">


					<label for="question3awnser2">Awnser 2:</label>
				    <input type="text" class="form-control" id="question3awnser2" name="question3awnser2">


					<label for="question3awnser3">Awnser 3:</label>
				    <input type="text" class="form-control" id="question3awnser3" name="question3awnser3">

				   	<label for="question3correctawnser">Correct Awnser:</label>
				    <select class="form-control" id="question3correctawnser" name="question3correctawnser">
					    <option>1</option>
					    <option>2</option>
					    <option>3</option>
					</select>

			</div>


			@include ('layouts.error')

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Create Quiz</button>
			</div>

		</form>



	</div>

</div>
<!-- required="required" -->
@endsection
