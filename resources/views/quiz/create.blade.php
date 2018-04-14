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

			<div id="questionbutton">
				<button type="button" id="add_qbutton" class="btn-info">Add Question</button>
			</div>
			<br>

			<div class="questions">
				<div class="form-group" id="q1">
						<label for="question1"><h2>Question 1:</h2></label>
					    <input type="text" class="form-control" id="question1" name="question[]">
					    <br>

					    <div class="awnsers">

						    <div class="awnser">
							    <label for="q1a1">Awnser 1:</label>
							    <input type="text" class="form-control" id="q1a1" name="q1a[]">
							</div>

							<div class="awnser">
								<label for="q1a2">Awnser 2:</label>
							    <input type="text" class="form-control" id="q1a2" name="q1a[]">
						    </div>

						    <div class="awnser">
								<label for="q1a3">Awnser 3:</label>
							    <input type="text" class="form-control" id="q1a3" name="q1a[]">
						    </div>

						    <div class="awnser">
								<label for="q1a4">Awnser 4:</label>
							    <input type="text" class="form-control" id="q1a4" name="q1a[]">
						    </div>

						    <div class="awnser">
								<label for="q1a5">Awnser 5:</label>
							    <input type="text" class="form-control" id="q1a5" name="q1a[]">
						    </div>
						    
						    <label for="q1correctawnser">Correct Awnser:</label>
						    <select class="form-control" id="q1correctawnser" name="q1correctawnser">
							    <option>1</option>
							    <option>2</option>
							    <option>3</option>
							    <option>4</option>
							    <option>5</option>
							</select>

						</div>

				</div>
			<hr>
			</div>
			

			<!--Dynamic questions inputs generated here-->


			@include ('layouts.error')

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Create Quiz</button>
			</div>

		</form>



	</div>

</div>

<script type="text/javascript">


///ADD QUESTIONS
$(document).ready(function() {
    var max_questions = 10; //maximum questions allowed
    var q = $(".questions"); //Fields wrapper
    
    var y = 1; //initlal questions count
    $("div.container").on("click", "#add_qbutton", function(e){ //on add input button click
        e.preventDefault();
        if(y < max_questions){ //max input box allowed
            y++; //text box increment
            $(q).append('<div class="form-group" id="q'+y+'"><label for="question'+y+'"><h2>Question '+y+':</h2></label><input type="text" class="form-control" id="question'+y+'" name="question[]"><br><div class="awnsers"><div class="awnser"><label for="q'+y+'a1">Awnser 1:</label><input type="text" class="form-control" id="q'+y+'a1" name="q'+y+'a[]"></div><div class="awnser"><label for="q'+y+'a2">Awnser 2:</label><input type="text" class="form-control" id="q'+y+'a2" name="q'+y+'a[]"></div><div class="awnser"><label for="q'+y+'a3">Awnser 3:</label><input type="text" class="form-control" id="q'+y+'a3" name="q'+y+'a[]"></div><div class="awnser"><label for="q'+y+'a4">Awnser 4:</label><input type="text" class="form-control" id="q'+y+'a4" name="q'+y+'a[]"></div><div class="awnser"><label for="q'+y+'a5">Awnser 5:</label><input type="text" class="form-control" id="q'+y+'a5" name="q'+y+'a[]"></div><label for="q'+y+'correctawnser">Correct Awnser:</label><select class="form-control" id="q'+y+'correctawnser" name="q'+y+'correctawnser"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></div><a href="#">Remove Question</a></div>'); //add input box
        }
    });
    
    $(q).on("click",".remove_question", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); y--;
    })
});





	

</script>


@endsection
