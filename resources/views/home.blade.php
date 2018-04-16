@extends('layouts.master')

@section('content')
<div class="container">
    @foreach ($users as $user)
        <section>
          <div class="container py-3">
            <div class="card bg-light">
              <div class="media px-3 py-3">
                  <img class="mr-3" width="100" height="100" src="images/boy.svg">
                  <div class="media-body">
                    <h5 class="mt-0">{{ $user->name }}</h5>
                    <h6>Location updated: {{ $user->updated_at->diffForHumans() }}</h6>
                    <a href="/map" class="btn btn-info">Find</a>
                  </div>
              </div>
            </div>
          </div>
        </section>
    @endforeach
    

</div>
@endsection

