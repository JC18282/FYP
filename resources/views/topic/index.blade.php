<!DOCTYPE html>
<html>
<head>
	<title>Topics</title>
</head>
<body>
	@foreach ($topics as $topic)
		<li>
			<a href="/topic/{{ $topic->id }}">
				{{ $topic->name }}
			</a>
		</li>
	@endforeach

</body>
</html>