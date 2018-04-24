<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Title</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Summernote CSS & JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  </head>

  <body>

    <!-- Navigation -->
    @if (Auth::user()->user_type == 'parent')
      @include ('nav.parentnav')
    @elseif (Auth::user()->user_type == 'child')
      @include ('nav.childnav')
    @endif

    <!-- Page Content -->
    @yield ('content')

<script>
  $( document ).ready(function() {
      console.log( "ready!" );
      if (navigator.geolocation) {
        var options = {
        enableHighAccuracy: true,
        timeout: 30000,
        maximumAge: Infinity
      };
      console.log('trying to get location...')
        navigator.geolocation.getCurrentPosition(success, error, options);
    }
  });

  function success(pos) {
    var location = pos.coords;

    console.log('Your current position is:');
    console.log(`Latitude : ${location.latitude}`);
    console.log(`Longitude: ${location.longitude}`);
    console.log(`More or less ${location.accuracy} meters.`);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
        url: '/map',
        type: 'POST',
        data: {
            latitude: location.latitude,
            longitude: location.longitude
        },
        success: function(result) {
          console.log('data sent to controller')
        }
    });
  }

  function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
  }
</script>
  </body>

</html>
