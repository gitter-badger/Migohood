@extends('layouts.edit')
@section('title', 'Space - Location')
@section('header')
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script src="/js/gmaps.min.js" type="text/javascript"></script>                       <!-- Gmaps core JS -->
  <link href="/css/maps.css" rel="stylesheet">                                          <!-- Maps Style core CSS -->
  <script src="/js/jquery.min.js" type="text/javascript"></script>                      <!-- Jquery core JS -->
  <script src="/js/location_map.js" type="text/javascript"></script>                    <!-- Location Map core JS -->
@stop

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

    <!--
    <div class="subtitle">
      <span>Address</span>
    </div>-->

    <!-- Type of Property -->
    <div class="input-field col s12 m6 l4">
      <select name="city" id="city" required>
        <option value="" disabled selected>Choose one</option>
        <span class="variable">{{ $cities=App\City::all() }}</span>
        @foreach($cities as $city)
          <option value="{{ $city->id }}" @if($resource->city_id == $city->id ) selected='selected' @endif> {{ $city->name }}, {{ $city->state }} </option>
        @endforeach
      </select>
      <label>City</label>
    </div>
    <!-- End of Type of Property -->

    <!-- Adress -->
    <div class="input-field col s12 m6 l8">
      <input Placeholder="Type the property address here" id="address" type="text" name="address" required @if($resource->address != NULL) value="{{ $resource->address }}" @endif>
      <label class="active" for="address">Address</label>
    </div>
    <!-- End of Address -->

    <!-- Location References -->
    <div class="input-field col s12 m12 l12">
      <textarea Placeholder="Tell us about your neighborhood" id="textarea2" name="location_references" class="materialize-textarea" required>@if($resource->location_references != NULL) {{ $resource->location_references }} @endif</textarea>
      <label class="text-area" for="textarea1">Location References</label>
    </div>
    <!-- End of Location References -->

    <!-- Next Button -->
    <div class="col s12 next">
      <button type="submit" class="btn ">NEXT</button>
    </div>
    <!-- End of Next Button -->

  </form>
  <!-- End of Update Space Basics -->

@stop

@section('info')
  <!-- Location Map -->
  <div id="location_map"></div>
  <!-- End of Location Map -->
  <h5 class="light">Don't worry</h5>
  <p class="light">Only people with a confirmed reservation will know your exact address</p>
@stop
