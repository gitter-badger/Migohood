@extends('layouts.edit')
@section('title')
  Basics - {{ $space->type }}, {{ $space->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('space.basics', ['hash' => $space->hash ]) }}"><li class="active"><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('space.description', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">border_color</i>Description</li></a>
    <a href="{{ route('space.location', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('space.photos', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('space.pricing', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">receipt</i>Pricing</li></a>
    <a href="{{ route('space.extras', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">star</i>Extras</li></a>
  </ul>
@stop

@section('content')
  <!-- Title -->
  <div class="title">
     <h5>Give more details</h5>
     <p  class="light">People can filter by listing basics to find a space they like. </p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Space Basics -->
  <form class="form row" form action="{{ route('space.basics.update', ['hash' => $space->hash ]) }}" method="POST">
    {{ csrf_field() }}

  <!-- Type of Property -->
  <div class="input-field col s4">
    <select name="type" required>
      <option value="" disabled selected>Choose one</option>
      <option value="Department" @if($space->type == 'Department') selected="selected" @endif>Department</option>
      <option value="House" @if($space->type == 'House') selected="selected" @endif>House</option>
      <option value="Bed and Breakfast" @if($space->type == 'Bed and Breakfast') selected="selected" @endif>Bed &amp; Breakfast </option>
      <option value="Apartment" @if($space->type == 'Apartment') selected="selected" @endif> Apartment</option>
      <option value="Loft" @if($space->type == 'Loft') selected="selected" @endif> Loft</option>
      <option value="Townhouse" @if($space->type == 'Townhouse') selected="selected" @endif> Townhouse</option>
      <option value="Condominium" @if($space->type == 'Condominium') selected="selected" @endif> Condominium</option>
      <option value="Bungalow" @if($space->type == 'Bungalow') selected="selected" @endif> Bungalow</option>
      <option value="Cabin" @if($space->type == 'Cabin') selected="selected" @endif> Cabin</option>
      <option value="Villa" @if($space->type == 'Villa') selected="selected" @endif> Villa</option>
      <option value="Castle" @if($space->type == 'Castle') selected="selected" @endif> Castle</option>
      <option value="Dorm" @if($space->type == 'Dorm') selected="selected" @endif> Dorm</option>
      <option value="Treehouse" @if($space->type == 'Treehouse') selected="selected" @endif> Treehouse</option>
      <option value="Boat" @if($space->type == 'Boat') selected="selected" @endif> Boat</option>
      <option value="Plane" @if($space->type == 'Plane') selected="selected" @endif> Plane</option>
      <option value="Camper/RV" @if($space->type == 'Camper/RV') selected="selected" @endif> Camper/RV</option>
      <option value="Igloo" @if($space->type == 'Igloo') selected="selected" @endif> Igloo</option>
      <option value="LightHouse" @if($space->type == 'LightHouse') selected="selected" @endif> LightHouse</option>
      <option value="Yurt" @if($space->type == 'Yurt') selected="selected" @endif> Yurt</option>
      <option value="Cave" @if($space->type == 'Cave') selected="selected" @endif> Cave</option>
      <option value="Island" @if($space->type == 'Island') selected="selected" @endif> Island</option>
      <option value="Chalet" @if($space->type == 'Chalet') selected="selected" @endif> Chalet</option>
      <option value="Train" @if($space->type == 'Train') selected="selected" @endif> Train</option>
      <option value="Other" @if($space->type == 'Other') selected="selected" @endif>Other </option>
    </select>
    <label>Type of Property</label>
  </div>
  <!-- Type of Property -->

  <!-- Accomodance -->
  <div class="input-field col s4">
    <select name="accomodance" required>
      <option value="" disabled selected>Choose one</option>
      <option value="All Space" @if($space->accomodance == 'All Space') selected="selected" @endif>All Space</option>
      <option value="Private Room" @if($space->accomodance == 'Private Room') selected="selected" @endif>Private Room</option>
      <option value="Shared Room" @if($space->accomodance == 'Shared Room') selected="selected" @endif>Shared Room</option>
    </select>
    <label>Accomodance</label>
  </div>
  <!-- Accomodance -->

  <!-- Capacity -->
  <div class="input-field col s4">
    <select name="capacity" required>
      <option value="" disabled selected>Choose one</option>
      <option value="1" @if($space->capacity == '1') selected="selected" @endif>1</option>
      <option value="2" @if($space->capacity == '2') selected="selected" @endif>2</option>
      <option value="3" @if($space->capacity == '3') selected="selected" @endif>3</option>
      <option value="4" @if($space->capacity == '4') selected="selected" @endif>4</option>
      <option value="5" @if($space->capacity == '5') selected="selected" @endif>5</option>
      <option value="6" @if($space->capacity == '6') selected="selected" @endif>6</option>
      <option value="7" @if($space->capacity == '7') selected="selected" @endif>7</option>
      <option value="8" @if($space->capacity == '8') selected="selected" @endif>8</option>
      <option value="9" @if($space->capacity == '9') selected="selected" @endif>9</option>
      <option value="10" @if($space->capacity == '10') selected="selected" @endif>10</option>
      <option value="11" @if($space->capacity == '11') selected="selected" @endif>11</option>
      <option value="12" @if($space->capacity == '12') selected="selected" @endif>12</option>
      <option value="13" @if($space->capacity == '13') selected="selected" @endif>13</option>
      <option value="14" @if($space->capacity == '14') selected="selected" @endif>14</option>
      <option value="15" @if($space->capacity == '15') selected="selected" @endif>15</option>
      <option value="16" @if($space->capacity == '16') selected="selected" @endif>16</option>
      <option value="16+" @if($space->capacity == '16+') selected="selected" @endif>16+</option>
    </select>
    <label>Capacity</label>
  </div>
  <!-- Capacity -->

  <!-- Bedrooms -->
  <div class="input-field col s4">
    <select name="bedrooms" required>
      <option value="" disabled selected>Choose one</option>
      <option value="Studio" @if($space->bedrooms == 'Studio') selected="selected" @endif>Studio</option>
      <option value="1" @if($space->bedrooms == '1') selected="selected" @endif>1</option>
      <option value="2" @if($space->bedrooms == '2') selected="selected" @endif>2</option>
      <option value="3" @if($space->bedrooms == '3') selected="selected" @endif>3</option>
      <option value="4" @if($space->bedrooms == '4') selected="selected" @endif>4</option>
      <option value="5" @if($space->bedrooms == '5') selected="selected" @endif>5</option>
      <option value="6" @if($space->bedrooms == '6') selected="selected" @endif>6</option>
      <option value="7" @if($space->bedrooms == '7') selected="selected" @endif>7</option>
      <option value="8" @if($space->bedrooms == '8') selected="selected" @endif>8</option>
      <option value="9" @if($space->bedrooms == '9') selected="selected" @endif>9</option>
      <option value="10" @if($space->bedrooms == '10') selected="selected" @endif>10</option>
      <option value="10+" @if($space->bedrooms == '10+') selected="selected" @endif>10+</option>
    </select>
    <label>Bedrooms</label>
  </div>
  <!-- Bedrooms -->

  <!-- Beds -->
  <div class="input-field col s4">
    <select name="beds" required>
      <option value="" disabled selected>Choose one</option>
      <option value="1" @if($space->beds == '1') selected="selected" @endif>1</option>
      <option value="2" @if($space->beds == '2') selected="selected" @endif>2</option>
      <option value="3" @if($space->beds == '3') selected="selected" @endif>3</option>
      <option value="4" @if($space->beds == '4') selected="selected" @endif>4</option>
      <option value="5" @if($space->beds == '5') selected="selected" @endif>5</option>
      <option value="6" @if($space->beds == '6') selected="selected" @endif>6</option>
      <option value="7" @if($space->beds == '7') selected="selected" @endif>7</option>
      <option value="8" @if($space->beds == '8') selected="selected" @endif>8</option>
      <option value="9" @if($space->beds == '9') selected="selected" @endif>9</option>
      <option value="10" @if($space->beds == '10') selected="selected" @endif>10</option>
      <option value="11" @if($space->beds == '11') selected="selected" @endif>11</option>
      <option value="12" @if($space->beds == '12') selected="selected" @endif>12</option>
      <option value="13" @if($space->beds == '13') selected="selected" @endif>13</option>
      <option value="14" @if($space->beds == '14') selected="selected" @endif>14</option>
      <option value="15" @if($space->beds == '15') selected="selected" @endif>15</option>
      <option value="16" @if($space->beds == '16') selected="selected" @endif>16</option>
      <option value="16+" @if($space->beds == '16+') selected="selected" @endif>16+</option>
    </select>
    <label>Beds</label>
  </div>
  <!-- Beds -->

  <!-- Bathrooms -->
  <div class="input-field col s4">
    <select name="bathrooms" required>
      <option value="" disabled selected>Choose one</option>
      <option value="None" @if($space->bathrooms == 'None') selected="selected" @endif>None</option>
      <option value="1/2" @if($space->bathrooms == '1/2') selected="selected" @endif>1/2</option>
      <option value="1" @if($space->bathrooms == '1') selected="selected" @endif>1</option>
      <option value="2" @if($space->bathrooms == '2') selected="selected" @endif>2</option>
      <option value="3" @if($space->bathrooms == '3') selected="selected" @endif>3</option>
      <option value="4" @if($space->bathrooms == '4') selected="selected" @endif>4</option>
      <option value="5" @if($space->bathrooms == '5') selected="selected" @endif>5</option>
      <option value="6" @if($space->bathrooms == '6') selected="selected" @endif>6</option>
      <option value="7" @if($space->bathrooms == '7') selected="selected" @endif>7</option>
      <option value="8" @if($space->bathrooms == '8') selected="selected" @endif>8</option>
      <option value="9" @if($space->bathrooms == '9') selected="selected" @endif>9</option>
      <option value="10" @if($space->bathrooms == '10') selected="selected" @endif>10</option>
      <option value="10+" @if($space->bathrooms == '10+') selected="selected" @endif>10+</option>
    </select>
    <label>Bathrooms</label>
  </div>
  <!-- Bathrooms -->


  <!-- Submit -->
  <div class="col s12 submit">
    <div class="left">
      <a href="{{ route('space.show', ['hash' => $space->hash ]) }}" class="btn btn-back">
         @if($space->public == 'no') Preview @else Show @endif
      </a>
    </div>

    <div class="right">
      <button type="submit" class="btn btn-save" id="next">Save and Continue</button>
    </div>
  </div>
  <!-- Submit -->
</form>
<!-- Uddate Space Basics -->


@stop

@section('info')
  @if($space->public == 'no')
    <img src="/img/app/space.png" alt="" />
      <h4 class="light">It's done</h4>
      <p class="light">
        Your new Space has been created, but.. It's not public yet. Please proceed to next steps
        to have your space available for rent.
      </p>
  @else
  <img src="/img/app/graph.png" alt="" />
    <h4 class="light">It's done</h4>
    <p class="light">
      Your Space is public now.. You can start making money.
      Off course you can proceed to next steps to improve your announce,
      giving more details or editing those that you provied before makes
      your space better.
    </p>
  @endif
@stop
