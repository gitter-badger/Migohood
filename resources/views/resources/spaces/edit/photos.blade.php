@extends('layouts.edit')
@section('title', 'Space - Location')
@section('menu')
  @include('resources/spaces/edit.menu')
@stop

@section('content')
  <!-- Title -->
  <div class="title">
    <h5>Photos</h5>
    <p class="light">Share your space with the world. Please select a cover picture of your space</p>
  </div>
  <!-- End of Title -->

  <!-- Update Space Photos  -->
  <form action="{{ route('resource.router.update', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'photos',
    'next' => 'price'
    ]) }}" method="POST">

    {{ csrf_field() }}

    <!--
    <div class="subtitle">
      <span>Address</span>
    </div>-->


    <!-- Next Button -->
    <div class="col s12 next">
      <button type="submit" class="btn ">NEXT</button>
    </div>
    <!-- End of Next Button -->

  </form>
  <!-- End of Update Space Photos -->

@stop

@section('info')
  <img src="/img/app/space.png" alt="" /><!-- Change it -->
  <h5 class="light">Almost Done!</h5>
  <p class="light">
     Describe your place as best you can. The better you describe your space, more guests you'll get.
  </p>
@stop
