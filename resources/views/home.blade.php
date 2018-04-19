@extends('layouts.master')

@section('content')
<div class="container">

  @if (!empty($children))
    @foreach ($children as $child)
        <section>
          <div class="container py-3">
            <div class="card bg-light">
              <div class="media px-3 py-3">
                  <img class="mr-3" width="100" height="100" src="images/{{ $child->gender }}.svg">
                  <div class="media-body">
                    <h5 class="mt-0">{{ $child->name }}</h5>
                    <h6>Location updated: {{ $child->updated_at->diffForHumans() }}</h6>
                    <a href="/map" class="btn btn-info">Find</a>
                  </div>
              </div>
            </div>
          </div>
        </section>
    @endforeach
  @elseif (!empty($parent))
        <section>
          <div class="container py-3">
            <div class="card bg-light">
              <div class="media px-3 py-3">
                  <img class="mr-3" width="100" height="100" src="images/{{ $parent->gender }}.svg">
                  <div class="media-body">
                    <h5 class="mt-0">{{ $parent->name }}</h5>
                    <h6>Location updated: {{ $parent->updated_at->diffForHumans() }}</h6>
                    <a href="/map" class="btn btn-info">Find</a>
                  </div>
              </div>
            </div>
          </div>
        </section>
  @else
    <p>No parents or children</p>
  @endif


</div>
@endsection

