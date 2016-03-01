@extends('layouts.edit')
@section('title', 'Space - Basics')
@section('menu')
  @include('resources/spaces/edit.menu')
@stop

@section('content')
  <!-- Title -->
  <div class="title">
    <h5>Give more details</h5>
    <p class="light">People can filter by listing basics to find a space they like. </p>
  </div>
  <!-- End of Title -->

  <!-- Update Space Basics -->
  <form class="selects" action="{{ route('resource.router.update', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'basics',
    'next' => 'description'
    ]) }}" method="POST">

    {{ csrf_field() }}

    <!-- Type of Property -->
    <div class="input-field col s12 m6 l4">
      <select name="type" required>
        <option value="" disabled selected>Choose one</option>
        <option value="Apartment" @if($resource->type == 'Apartment') selected="selected" @endif> Apartment</option>
        <option value="House" @if($resource->type == 'House') selected="selected" @endif> House</option>
        <option value="B &amp; B" @if($resource->type == 'B & B') selected="selected" @endif> B &amp; B </option>
        <option value="Loft" @if($resource->type == 'Loft') selected="selected" @endif> Loft</option>
        <option value="Townhouse" @if($resource->type == 'Townhouse') selected="selected" @endif> Townhouse</option>
        <option value="Condominium" @if($resource->type == 'Condominium') selected="selected" @endif> Condominium</option>
        <option value="Bungalow" @if($resource->type == 'Bungalow') selected="selected" @endif> Bungalow</option>
        <option value="Cabin" @if($resource->type == 'Cabin') selected="selected" @endif> Cabin</option>
        <option value="Villa" @if($resource->type == 'Villa') selected="selected" @endif> Villa</option>
        <option value="Castle" @if($resource->type == 'Castle') selected="selected" @endif> Castle</option>
        <option value="Dorm" @if($resource->type == 'Dorm') selected="selected" @endif> Dorm</option>
        <option value="Treehouse" @if($resource->type == 'Treehouse') selected="selected" @endif> Treehouse</option>
        <option value="Boat" @if($resource->type == 'Boat') selected="selected" @endif> Boat</option>
        <option value="Plane" @if($resource->type == 'Plane') selected="selected" @endif> Plane</option>
        <option value="Camper/RV" @if($resource->type == 'Camper/RV') selected="selected" @endif> Camper/RV</option>
        <option value="Igloo" @if($resource->type == 'Igloo') selected="selected" @endif> Igloo</option>
        <option value="LightHouse" @if($resource->type == 'LightHouse') selected="selected" @endif> LightHouse</option>
        <option value="Yurt" @if($resource->type == 'Yurt') selected="selected" @endif> Yurt</option>
        <option value="Cave" @if($resource->type == 'Cave') selected="selected" @endif> Cave</option>
        <option value="Island" @if($resource->type == 'Island') selected="selected" @endif> Island</option>
        <option value="Chalet" @if($resource->type == 'Chalet') selected="selected" @endif> Chalet</option>
        <option value="Train" @if($resource->type == 'Train') selected="selected" @endif> Train</option>
        <option value="Other" @if($resource->type == 'Other') selected="selected" @endif> Other </option>
      </select>
      <label>Type of Property</label>
    </div>
    <!-- End of Type of Property -->

    <!-- Type of Room -->
    <div class="input-field col s12 m6 l4">
      <select name="room" required>
        <option value="" disabled selected>Choose one</option>
        <option value="Private" @if($resource->room == 'Private') selected="selected" @endif> Private Room </option>
        <option value="Shared" @if($resource->room == 'Shared') selected="selected" @endif> Shared Room </option>
      </select>
      <label>Type of Room</label>
    </div>
    <!-- End of Type of Room -->

    <!-- Capacity -->
    <div class="input-field col s12 m6 l4">
      <select name="capacity" required>
        <option value="" disabled selected>Choose one</option>
        <option value="1" @if($resource->capacity == '1') selected="selected" @endif> 1 Guest</option>
        <option value="2" @if($resource->capacity == '2') selected="selected" @endif> 2 Guests</option>
        <option value="3" @if($resource->capacity == '3') selected="selected" @endif> 3 Guests</option>
        <option value="4" @if($resource->capacity == '4') selected="selected" @endif> 4 Guests</option>
        <option value="5" @if($resource->capacity == '5') selected="selected" @endif> 5 Guests</option>
        <option value="6" @if($resource->capacity == '6') selected="selected" @endif> 6 Guests</option>
        <option value="7" @if($resource->capacity == '7') selected="selected" @endif> 7 Guests</option>
        <option value="8" @if($resource->capacity == '8') selected="selected" @endif> 8 Guests</option>
        <option value="9" @if($resource->capacity == '9') selected="selected" @endif> 9 Guests</option>
        <option value="10" @if($resource->capacity == '10') selected="selected" @endif> 10 Guests</option>
        <option value="11" @if($resource->capacity == '11') selected="selected" @endif> 11 Guests</option>
        <option value="12" @if($resource->capacity == '12') selected="selected" @endif> 12 Guests</option>
        <option value="13" @if($resource->capacity == '13') selected="selected" @endif> 13 Guests</option>
        <option value="14" @if($resource->capacity == '14') selected="selected" @endif> 14 Guests</option>
        <option value="15" @if($resource->capacity == '15') selected="selected" @endif> 15 Guests</option>
        <option value="16" @if($resource->capacity == '16') selected="selected" @endif> 16 Guests</option>
      </select>
      <label>Capacity</label>
    </div>
    <!-- End of Capacity -->

    <!-- Bedrooms -->
    <div class="input-field col s12 m6 l4">
      <select name="bedrooms" required>
        <option value="" disabled selected>Choose one</option>
        <option value="1" @if($resource->bedrooms == '1') selected="selected" @endif> 1 Bedroom</option>
        <option value="2" @if($resource->bedrooms == '2') selected="selected" @endif> 2 Bedrooms</option>
        <option value="3" @if($resource->bedrooms == '3') selected="selected" @endif> 3 Bedrooms</option>
        <option value="4" @if($resource->bedrooms == '4') selected="selected" @endif> 4 Bedrooms</option>
        <option value="5" @if($resource->bedrooms == '5') selected="selected" @endif> 5 Bedrooms</option>
        <option value="6" @if($resource->bedrooms == '6') selected="selected" @endif> 6 Bedrooms</option>
        <option value="7" @if($resource->bedrooms == '7') selected="selected" @endif> 7 Bedrooms</option>
        <option value="8" @if($resource->bedrooms == '8') selected="selected" @endif> 8 Bedrooms</option>
        <option value="9" @if($resource->bedrooms == '9') selected="selected" @endif> 9 Bedrooms</option>
        <option value="10" @if($resource->bedrooms == '10') selected="selected" @endif> 10 Bedrooms</option>
        <option value="11" @if($resource->bedrooms == '11') selected="selected" @endif> 11 Bedrooms</option>
        <option value="12" @if($resource->bedrooms == '12') selected="selected" @endif> 12 Bedrooms</option>
        <option value="13" @if($resource->bedrooms == '13') selected="selected" @endif> 13 Bedrooms</option>
        <option value="14" @if($resource->bedrooms == '14') selected="selected" @endif> 14 Bedrooms</option>
        <option value="15" @if($resource->bedrooms == '15') selected="selected" @endif> 15 Bedrooms</option>
        <option value="16" @if($resource->bedrooms == '16') selected="selected" @endif> 16 Bedrooms</option>
      </select>
      <label>Bedrooms</label>
    </div>
    <!-- End of Bedrooms -->

    <!-- Beds -->
    <div class="input-field col s12 m6 l4">
      <select name="beds" required>
        <option value="" disabled selected>Choose one</option>
        <option value="1" @if($resource->beds == '1') selected="selected" @endif> 1 Bed</option>
        <option value="2" @if($resource->beds == '2') selected="selected" @endif> 2 Beds</option>
        <option value="3" @if($resource->beds == '3') selected="selected" @endif> 3 Beds</option>
        <option value="4" @if($resource->beds == '4') selected="selected" @endif> 4 Beds</option>
        <option value="5" @if($resource->beds == '5') selected="selected" @endif> 5 Beds</option>
        <option value="6" @if($resource->beds == '6') selected="selected" @endif> 6 Beds</option>
        <option value="7" @if($resource->beds == '7') selected="selected" @endif> 7 Beds</option>
        <option value="8" @if($resource->beds == '8') selected="selected" @endif> 8 Beds</option>
        <option value="9" @if($resource->beds == '9') selected="selected" @endif> 9 Beds</option>
        <option value="10" @if($resource->beds == '10') selected="selected" @endif> 10 Beds</option>
        <option value="11" @if($resource->beds == '11') selected="selected" @endif> 11 Beds</option>
        <option value="12" @if($resource->beds == '12') selected="selected" @endif> 12 Beds</option>
        <option value="13" @if($resource->beds == '13') selected="selected" @endif> 13 Beds</option>
        <option value="14" @if($resource->beds == '14') selected="selected" @endif> 14 Beds</option>
        <option value="15" @if($resource->beds == '15') selected="selected" @endif> 15 Beds</option>
        <option value="16" @if($resource->beds == '16') selected="selected" @endif> 16 Beds</option>
        <option value="17" @if($resource->beds == '17') selected="selected" @endif> 17 Beds</option>
        <option value="18" @if($resource->beds == '18') selected="selected" @endif> 18 Beds</option>
        <option value="19" @if($resource->beds == '19') selected="selected" @endif> 19 Beds</option>
        <option value="20" @if($resource->beds == '20') selected="selected" @endif> 20 Beds</option>
      </select>
      <label>Beds</label>
    </div>
    <!-- End of Beds -->

    <!-- Beds -->
    <div class="input-field col s12 m6 l4">
      <select name="bathrooms" required>
        <option value="" disabled selected>Choose one</option>
        <option value="1" @if($resource->bathrooms == '1') selected="selected" @endif> 1 Bathroom</option>
        <option value="2" @if($resource->bathrooms == '2') selected="selected" @endif> 2 Bathrooms</option>
        <option value="3" @if($resource->bathrooms == '3') selected="selected" @endif> 3 Bathrooms</option>
        <option value="4" @if($resource->bathrooms == '4') selected="selected" @endif> 4 Bathrooms</option>
        <option value="5" @if($resource->bathrooms == '5') selected="selected" @endif> 5 Bathrooms</option>
        <option value="6" @if($resource->bathrooms == '6') selected="selected" @endif> 6 Bathrooms</option>
        <option value="7" @if($resource->bathrooms == '7') selected="selected" @endif> 7 Bathrooms</option>
        <option value="8" @if($resource->bathrooms == '8') selected="selected" @endif> 8 Bathrooms</option>
        <option value="9" @if($resource->bathrooms == '9') selected="selected" @endif> 9 Bathrooms</option>
        <option value="10" @if($resource->bathrooms == '10') selected="selected" @endif> 10 Bathrooms</option>
        <option value="11" @if($resource->bathrooms == '11') selected="selected" @endif> 11 Bathrooms</option>
        <option value="12" @if($resource->bathrooms == '12') selected="selected" @endif> 12 Bathrooms</option>
        <option value="13" @if($resource->bathrooms == '13') selected="selected" @endif> 13 Bathrooms</option>
        <option value="14" @if($resource->bathrooms == '14') selected="selected" @endif> 14 Bathrooms</option>
        <option value="15" @if($resource->bathrooms == '15') selected="selected" @endif> 15 Bathrooms</option>
        <option value="16" @if($resource->bathrooms == '16') selected="selected" @endif> 16 Bathrooms</option>
      </select>
      <label>Bathrooms</label>
    </div>
    <!-- End of Bathrooms -->

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
