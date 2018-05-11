@extends('layouts.master')

@section('content')
<div class="container">

<h1>{{ $quiz->title }}</h1>

@foreach ($quiz->questions as $question)
	<table class="table table-striped table-dark">
		<tr>
			<th>Question</th>
			<td><h4>{{ $question->question }}<h4></td>
			<td></td>
			<td>
				<a href="#" class="btn btn-primary">Edit Question</a>
				<a href="#" class="btn btn-danger">Delete Question</a>
			</td>

		</tr>

		@foreach ($question->awnsers as $awnser)
			<tr>
				<th>Awnser</th>
				<td>{{ $awnser->body }}</td>
				@if ($awnser->correct == 1)
					<td>Correct</td>
				@else
					<td>Incorrect</td>
				@endif
				<td>
					<a href="#" class="btn btn-primary">Edit Awnser</a>
					<a href="#" class="btn btn-danger">Delete Awnser</a>
				</td>
			</tr>
		@endforeach
	</table>
	<a href="#"><img src="../images/002-plus.png"></a>
	<br>

@endforeach

</div>
@endsection

