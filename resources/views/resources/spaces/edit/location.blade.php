@extends('layouts.edit')
@section('title', 'Space - Location')
@section('menu')
  @include('resources/spaces/edit.menu')
@stop

@section('content')
  <!-- Title -->
  <div class="title">
    <h5>Location</h5>
    <p class="light">Provide as accurated as posible your address</p>
  </div>
  <!-- End of Title -->

  <!-- Update Space Basics -->
  <form action="{{ route('resource.router.update', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'location',
    'next' => 'photos'
    ]) }}" method="POST">

    {{ csrf_field() }}

    <!-- Next Button -->
    <div class="col s12 next">
      <button type="submit" class="btn ">NEXT</button>
    </div>
    <!-- End of Next Button -->

  </form>
  <!-- End of Update Space Basics -->

@stop

@section('info')
  <img src="/img/app/space.png" alt="" /><!-- Change it -->
  <h5 class="light">Almost Done!</h5>
  <p class="light">
     Describe your place as best you can. The better you describe your space, more guests you'll get.
  </p>
@stop
