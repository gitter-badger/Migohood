@extends('layouts.edit')
@section('title')
  Extras - {{ $office->type }}, {{ $office->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'basics' ]) }}"><li><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'location' ]) }}"><li><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'photos' ]) }}"><li><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'pricing' ]) }}"><li><i class="material-icons left">receipt</i>Pricing</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'extras' ]) }}"><li class="active"><i class="material-icons left">star</i>Extras</li></a>
  </ul>
@stop

@section('content')

  <!-- Title -->
  <div class="title">
     <h5>Extras</h5>
     <p  class="light">Additional Amenities makes your announce interesting. Choose what you have.</p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Office Extras -->
  <form class="form row" form action="{{ route('office.router.update', ['hash' => $office->hash, 'route' => 'extras' ]) }}" method="POST">
    {{ csrf_field() }}

  <div class="container extras">

    <!-- Ammenities -->
    <div class="col s6">

      <p>
        <input type="checkbox" name="bathroom" value="yes" id="bathroom" @if($office->bathroom == 'yes') checked="checked" @endif />
        <label for="bathroom">Bathroom</label>
      </p>

      <p>
        <input type="checkbox" name="tv_cable" value="yes" id="tv_cable" @if($office->tv_cable == 'yes') checked="checked" @endif />
        <label for="tv_cable">Tv Cable</label>
      </p>

      <p>
        <input type="checkbox" name="air_conditioning" value="yes" id="air_conditioning" @if($office->air_conditioning == 'yes') checked="checked" @endif />
        <label for="air_conditioning">Air Conditioning</label>
      </p>

      <p>
        <input type="checkbox" name="heating" value="yes" id="heating" @if($office->heating == 'yes') checked="checked" @endif />
        <label for="heating">Heating</label>
      </p>

      <p>
        <input type="checkbox" name="wifi" value="yes" id="wifi" @if($office->wifi == 'yes') checked="checked" @endif />
        <label for="wifi">Wifi</label>
      </p>

    </div>
    <!-- Amenities -->


    <!-- Other -->
    <div class="col s6">
      <p>
        <input type="checkbox" name="parking" value="yes" id="parking" @if($office->parking == 'yes') checked="checked" @endif />
        <label for="parking">Parking</label>
      </p>

      <p>
        <input type="checkbox" name="elevator" value="yes" id="elevator" @if($office->elevator == 'yes') checked="checked" @endif />
        <label for="elevator">Elevator</label>
      </p>

      <p>
        <input type="checkbox" name="room_meeting" value="yes" id="room_meeting" @if($office->room_meeting == 'yes') checked="checked" @endif />
        <label for="room_meeting">Meeting Room</label>
      </p>

      <br>

      <p>
        <input type="checkbox" name="smoking_allowed" value="yes" id="smoking_allowed" @if($office->smoking_allowed == 'yes') checked="checked" @endif />
        <label for="smoking_allowed">Smoking Allowed</label>
      </p>
    </div>
    <!-- Other -->

  </div>

  <!-- Submit -->
  <div class="col s12 submit">
    <div class="left">
      <a href="{{ route('office.show', ['hash' => $office->hash ]) }}" class="btn btn-back">
        @if($office->public == 'yes') Show @endif
      </a>
    </div>

    <div class="right">
      <button type="submit" class="btn btn-save" id="next">Finish</button>
    </div>
  </div>
  <!-- Submit -->
</form>
<!-- Uddate Office Extras -->


@stop

@section('info')
  @if($office->public == 'no')
    <img src="/img/app/space.png" alt="" />
      <h4 class="light">It's done</h4>
      <p class="light">
        Your new Office has been created, but.. It's not public yet. Please proceed to next steps
        to have your Office available for rent.
      </p>
  @else
  <img src="/img/app/graph.png" alt="" />
    <h4 class="light">It's done</h4>
    <p class="light">
      Your Office is public now.. You can start making money.
      Off course you can proceed to next steps to improve your announce,
      giving more details or editing those that you provied before makes
      your office better.
    </p>
  @endif
@stop
