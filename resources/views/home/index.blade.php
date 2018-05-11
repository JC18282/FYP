@extends('layouts.master')

@section('content')
<div class="container">

  @if (!empty($children))
    @foreach ($children as $child)
        @include ('home.child')
    @endforeach
  @elseif (!empty($parent))
        @include ('home.parent')
  @else
    <p>No parents or children</p>
  @endif


</div>
@endsection

