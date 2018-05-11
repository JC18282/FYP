@extends ('layouts.master')

@section ('content')
<div class="container">
	<div class="col-sm-12">
		<h1>Add a new child to your account.</h1>
		<hr>

		@include ('layouts.error')

		<p>Use the from below to add a new child to your account.</p>
		<form method="POST" action="/children">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="name">Name:</label>
			    <input type="text" class="form-control" id="name" name="name">
			</div>

			<div class="form-group">
			    <label for="email">Email:</label>
			    <input type="email" class="form-control" id="email" name="email">
			</div>

			<div class="form-group">
			    <label for="email">Password:</label>
			    <input type="password" class="form-control" id="password" name="password">
			</div>

			<div class="form-group">
			    <label for="gender">Gender:</label>
			    <select name="gender">
                    <option value="m">Male</option>
                    <option value="f">Female</option>                   
                </select>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
			</div>

		</form>





	</div>

</div>
@endsection
