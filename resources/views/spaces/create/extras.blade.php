@extends('layouts.edit')
@section('title')
  Extras - {{ $space->type }}, {{ $space->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('space.basics', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('space.description', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">border_color</i>Description</li></a>
    <a href="{{ route('space.location', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('space.photos', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('space.pricing', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">receipt</i>Pricing</li></a>
    <a href="{{ route('space.extras', ['hash' => $space->hash ]) }}"><li class="active"><i class="material-icons left">star</i>Extras</li></a>
  </ul>
@stop

@section('content')
  <!-- Title -->
  <div class="title">
     <h5>Extras</h5>
     <p  class="light">Additional Amenities makes your announce interesting. Choose what you have.</p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Space Basics -->
  <form class="form row" form action="{{ route('space.extras.update', ['hash' => $space->hash ]) }}" method="POST">
    {{ csrf_field() }}

  <div class="container extras">

    <!-- Ammenities -->
    <div class="col s6">
      <p>
        <input type="checkbox" name="towels" value="yes" id="towels" @if($space->towels == 'yes') checked="checked" @endif />
        <label for="towels">Towels</label>
      </p>

      <p>
        <input type="checkbox" name="bed_sheets" value="yes" id="bed_sheets" @if($space->bed_sheets == 'yes') checked="checked" @endif />
        <label for="bed_sheets">Bed Sheets</label>
      </p>

      <p>
        <input type="checkbox" name="soap" value="yes" id="soap" @if($space->soap == 'yes') checked="checked" @endif />
        <label for="soap">Soap</label>
      </p>

      <p>
        <input type="checkbox" name="toilet_paper" value="yes" id="toilet_paper" @if($space->toilet_paper == 'yes') checked="checked" @endif />
        <label for="toilet_paper">Toilet Paper</label>
      </p>

      <p>
        <input type="checkbox" name="shampoo" value="yes" id="shampoo" @if($space->shampoo == 'yes') checked="checked" @endif />
        <label for="shampoo">Shampoo</label>
      </p>

      <p>
        <input type="checkbox" name="tv" value="yes" id="tv" @if($space->tv == 'yes') checked="checked" @endif />
        <label for="tv">Tv</label>
      </p>

      <p>
        <input type="checkbox" name="air_conditioning" value="yes" id="air_conditioning" @if($space->air_conditioning == 'yes') checked="checked" @endif />
        <label for="air_conditioning">Air Conditioning</label>
      </p>

      <p>
        <input type="checkbox" name="heating" value="yes" id="heating" @if($space->heating == 'yes') checked="checked" @endif />
        <label for="heating">Heating</label>
      </p>

      <p>
        <input type="checkbox" name="kitchen" value="yes" id="kitchen" @if($space->kitchen == 'yes') checked="checked" @endif />
        <label for="kitchen">Kitchen</label>
      </p>

      <p>
        <input type="checkbox" name="wifi" value="yes" id="wifi" @if($space->wifi == 'yes') checked="checked" @endif />
        <label for="wifi">Wifi</label>
      </p>

      <p>
        <input type="checkbox" name="iron" value="yes" id="iron" @if($space->iron == 'yes') checked="checked" @endif />
        <label for="iron">Iron</label>
      </p>

      <p>
        <input type="checkbox" name="breakfast" value="yes" id="breakfast" @if($space->breakfast == 'yes') checked="checked" @endif />
        <label for="breakfast">Breakfast</label>
      </p>

    </div>
    <!-- Amenities -->


    <!-- Other -->
    <div class="col s6">
      <p>
        <input type="checkbox" name="hot_tub" value="yes" id="hot_tub" @if($space->hot_tub == 'yes') checked="checked" @endif />
        <label for="hot_tub">Hot tub</label>
      </p>

      <p>
        <input type="checkbox" name="washer" value="yes" id="washer" @if($space->washer == 'yes') checked="checked" @endif />
        <label for="washer">Washer</label>
      </p>

      <p>
        <input type="checkbox" name="pool" value="yes" id="pool" @if($space->pool == 'yes') checked="checked" @endif />
        <label for="pool">Pool</label>
      </p>

      <p>
        <input type="checkbox" name="dryer" value="yes" id="dryer" @if($space->dryer == 'yes') checked="checked" @endif />
        <label for="dryer">Dryer</label>
      </p>

      <p>
        <input type="checkbox" name="parking" value="yes" id="parking" @if($space->parking == 'yes') checked="checked" @endif />
        <label for="parking">Parking</label>
      </p>

      <p>
        <input type="checkbox" name="gym" value="yes" id="gym" @if($space->gym == 'yes') checked="checked" @endif />
        <label for="gym">Gym</label>
      </p>

      <p>
        <input type="checkbox" name="elevator" value="yes" id="elevator" @if($space->elevator == 'yes') checked="checked" @endif />
        <label for="elevator">Elevator</label>
      </p>

      <p>
        <input type="checkbox" name="workspace" value="yes" id="workspace" @if($space->workspace == 'yes') checked="checked" @endif />
        <label for="workspace">Workspace</label>
      </p>

      <br>

      <p>
        <input type="checkbox" name="family_kid_friendly" value="yes" id="family_kid_friendly" @if($space->family_kid_friendly == 'yes') checked="checked" @endif />
        <label for="family_kid_friendly">Family/Kid Friendly</label>
      </p>

      <p>
        <input type="checkbox" name="smoking_allowed" value="yes" id="smoking_allowed" @if($space->smoking_allowed == 'yes') checked="checked" @endif />
        <label for="smoking_allowed">Smoking Allowed</label>
      </p>

      <p>
        <input type="checkbox" name="pets_allowed" value="yes" id="pets_allowed" @if($space->pets_allowed == 'yes') checked="checked" @endif />
        <label for="pets_allowed">Pets Allowed</label>
      </p>



    </div>
    <!-- Other -->
  </div>

  <!-- Submit -->
  <div class="col s12 submit">
    <div class="left">
      <a href="{{ route('space.show', ['hash' => $space->hash ]) }}" class="btn btn-back">
        @if($space->public == 'no') Preview @else Show @endif
      </a>
    </div>

    <div class="right">
      <button type="submit" class="btn btn-save" id="next">Finish</button>
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
