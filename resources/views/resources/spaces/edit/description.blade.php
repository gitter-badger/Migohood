@extends('layouts.edit')
@section('title', 'Space - Description')
@section('menu')
  @include('resources/spaces/edit.menu')
@stop

@section('content')
  <!-- Title -->
  <div class="title">
    <h5>Describe your place</h5>
    <p class="light">Many people fall in love of the details, what if you provide a cool and original description of the place? </p>
  </div>
  <!-- End of Title -->

  <!-- Update Space Description -->
  <form class="" action="{{ route('resource.router.update', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'description',
    'next' => 'location'
    ]) }}" method="POST">

    {{ csrf_field() }}

    <!-- Title -->
    <div class="input-field col s12 m12 l12">
      <input Placeholder="Type a title" id="title" type="text" name="title" required @if($resource->title != NULL) value="{{ $resource->title }}" @endif>
      <label class="active" for="title">Title</label>
    </div>
    <!-- End of title -->

    <!-- Description -->
    <div class="input-field col s12 m12 l12">
      <textarea Placeholder="Describe your space" id="textarea1" name="description" class="materialize-textarea" required>@if($resource->description != NULL) {{ $resource->description }} @endif</textarea>
      <label class="text-area" for="textarea1">Description</label>
    </div>
    <!-- End of Description -->

    <div class="subtitle">
      <span>Extras</span>
    </div>

    <!-- Checboxes 1 -->
    <div class="checkboxes col s12 m6 l6">
      <p><input type="checkbox" name="pets_allowed" value="yes" id="pets_allowed" @if($resource->pets_allowed == 'yes') checked="checked" @endif />
         <label for="pets_allowed">Pets Allowed</label></p>

      <p><input type="checkbox" name="events_allowed" value="yes" id="events_allowed" @if($resource->events_allowed == 'yes') checked="checked" @endif />
         <label for="events_allowed">Events Allowed</label></p>

      <p><input type="checkbox" name="production_allowed" value="yes" id="production_allowed" @if($resource->production_allowed == 'yes') checked="checked" @endif />
         <label for="production_allowed">Production (Video or Photography) Allowed</label></p>

      <p><input type="checkbox" name="family_friendly" value="yes" id="family_friendly" @if($resource->family_friendly == 'yes') checked="checked" @endif />
         <label for="family_friendly">Family Friendly</label></p>
    </div>
    <!-- End of Checboxes 1 -->

    <!-- Checboxes 2 -->
    <div class="checkboxes col s12 m6 l6">
      <p><input type="checkbox" name="business_guest" value="yes" id="business_guest" @if($resource->business_guest == 'yes') checked="checked" @endif />
         <label for="business_guest">Business Guest</label></p>

      <p><input type="checkbox" name="smoke_free" value="yes" id="smoke_free" @if($resource->smoke_free == 'yes') checked="checked" @endif />
         <label for="smoke_free">Smoke free</label></p>

      <p><input type="checkbox" name="gym" value="yes" id="gym" @if($resource->gym == 'yes') checked="checked" @endif />
         <label for="gym">Gym</label></p>

      <p><input type="checkbox" name="parking" value="yes" id="parking" @if($resource->parking == 'yes') checked="checked" @endif />
         <label for="parking">Parking</label></p>
    </div>
    <!-- End of Checboxes 2 -->

    <!-- Next Button -->
    <div class="col s12 next">
      <button type="submit" class="btn ">NEXT</button>
    </div>
    <!-- End of Next Button -->

  </form>
  <!-- End of Update Space Description -->

@stop

@section('info')
  <img src="/img/app/space.png" alt="" /><!-- Change it -->
  <h5 class="light">Almost Done!</h5>
  <p class="light">
     Describe your place as best you can. The better you describe your space, more guests you'll get.
  </p>
@stop
