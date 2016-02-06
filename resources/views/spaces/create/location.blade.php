@extends('layouts.edit')
@section('title')
  Location - {{ $space->type }}, {{ $space->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('space.router', ['hash' => $space->hash, 'route' => 'basics' ]) }}"><li><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('space.router', ['hash' => $space->hash, 'route' => 'description' ]) }}"><li><i class="material-icons left">border_color</i>Description</li></a>
    <a href="{{ route('space.router', ['hash' => $space->hash, 'route' => 'location' ]) }}"><li class="active"><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('space.router', ['hash' => $space->hash, 'route' => 'photos' ]) }}"><li><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('space.router', ['hash' => $space->hash, 'route' => 'pricing' ]) }}"><li><i class="material-icons left">receipt</i>Pricing</li></a>
    <a href="{{ route('space.router', ['hash' => $space->hash, 'route' => 'extras' ]) }}"><li><i class="material-icons left">star</i>Extras</li></a>
  </ul>
@stop

@section('content')
  <!-- Title -->
  <div class="title">
     <h5>Location</h5>
     <p  class="light">Provide as accurated as posible your address </p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Space Location -->
  <form class="form row" form action="{{ route('space.router.update', ['hash' => $space->hash, 'route' => 'location' ]) }}" method="POST">
    {{ csrf_field() }}

  <!-- Country -->
  <div class="input-field col s6">
    <select name="country" required>
      <option value="" disabled selected>Choose one</option>
        @foreach($countries as $country)
          <option value="{{ $country->name }}" @if($space->country == $country->name ) selected='selected' @endif> {{ $country->name }} </option>
        @endforeach
    </select>
    <label>Country</label>
  </div>
  <!-- Country -->

  <!-- City -->
  <div class="input-field col s6">
    <input Placeholder="Type your city" id="city" type="text" name="city" required @if($space->city != 'null') value="{{ $space->city }}" @endif>
    <label class="active" for="city">City</label>
  </div>
  <!-- City -->

  <!-- Address -->
  <div class="input-field col s6">
    <input Placeholder="Type your address" id="address" type="text" name="address" required @if($space->address != 'null') value="{{ $space->address }}" @endif>
    <label class="active" for="address">Address</label>
  </div>
  <!-- Address -->

  <!-- zip -->
  <div class="input-field col s6">
    <input Placeholder="Type ZIP" id="zip" type="text" name="zip" @if($space->zip != 'null') value="{{ $space->zip }}" @endif>
    <label class="active" for="zip">ZIP (optional)</label>
  </div>
  <!-- zip -->

  <!-- Loction  -->
  <div class="input-field col s12">
    <input Placeholder="Type references about your location" id="location" type="text" name="location_references" required @if($space->location_references != 'null') value="{{ $space->location_references }}" @endif>
    <label class="active" for="location">Location References </label>
  </div>
  <!-- Location -->


  <!-- Submit -->
  <div class="col s12 submit">
    <div class="left">
      <a href="{{ route('space.show', ['hash' => $space->hash ]) }}" class="btn btn-back">
        @if($space->public == 'yes') Show @endif
      </a>
    </div>

    <div class="right">
      <button type="submit" class="btn btn-save" id="next">Save and Continue</button>
    </div>
  </div>
  <!-- Submit -->
</form>
<!-- Uddate Space Location -->


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