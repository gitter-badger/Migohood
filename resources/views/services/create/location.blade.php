@extends('layouts.edit')
@section('title')
  Location - {{ $service->type }}, {{ $service->title }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'basics' ]) }}"><li><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'location' ]) }}"><li class="active"><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'photos' ]) }}"><li><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'pricing' ]) }}"><li><i class="material-icons left">receipt</i>Pricing</li></a>
  </ul>
@stop

@section('content')
  <!-- Title -->
  <div class="title">
     <h5>Location</h5>
     <p  class="light">Provide as accurated as posible your address </p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Service Location -->
  <form class="form row" form action="{{ route('service.router.update', ['hash' => $service->hash, 'route' => 'location' ]) }}" method="POST">
    {{ csrf_field() }}

  <!-- Country -->
  <div class="input-field col s6">
    <select name="country" required>
      <option value="" disabled selected>Choose one</option>
        @foreach($countries as $country)
          <option value="{{ $country->name }}" @if($service->country == $country->name ) selected='selected' @endif> {{ $country->name }} </option>
        @endforeach
    </select>
    <label>Country</label>
  </div>
  <!-- Country -->

  <!-- City -->
  <div class="input-field col s6">
    <input Placeholder="Type your city" id="city" type="text" name="city" required @if($service->city != 'null') value="{{ $service->city }}" @endif>
    <label class="active" for="city">City</label>
  </div>
  <!-- City -->

  <!-- Address -->
  <div class="input-field col s6">
    <input Placeholder="Type your address" id="address" type="text" name="address" required @if($service->address != 'null') value="{{ $service->address }}" @endif>
    <label class="active" for="address">Address</label>
  </div>
  <!-- Address -->

  <!-- zip -->
  <div class="input-field col s6">
    <input Placeholder="Type ZIP" id="zip" type="text" name="zip" @if($service->zip != 'null') value="{{ $service->zip }}" @endif>
    <label class="active" for="zip">ZIP (optional)</label>
  </div>
  <!-- zip -->

  <!-- Loction  -->
  <div class="input-field col s12">
    <input Placeholder="Type references about your location" id="location" type="text" name="location_references" required @if($service->location_references != 'null') value="{{ $service->location_references }}" @endif>
    <label class="active" for="location">Location References </label>
  </div>
  <!-- Location -->


  <!-- Submit -->
  <div class="col s12 submit">
    <div class="left">
      <a href="{{ route('service.show', ['hash' => $service->hash ]) }}" class="btn btn-back">
        @if($service->public == 'yes') Show @endif
      </a>
    </div>

    <div class="right">
      <button type="submit" class="btn btn-save" id="next">Save and Continue</button>
    </div>
  </div>
  <!-- Submit -->
</form>
<!-- Uddate Service Location -->


@stop

@section('info')
  @if($service->public == 'no')
    <img src="/img/app/space.png" alt="" />
      <h4 class="light">It's done</h4>
      <p class="light">
        Your new Service has been created, but.. It's not public yet. Please proceed to next steps
        to have your service available for rent.
      </p>
  @else
  <img src="/img/app/graph.png" alt="" />
    <h4 class="light">It's done</h4>
    <p class="light">
      Your Service is public now.. You can start making money.
      Off course you can proceed to next steps to improve your announce,
      giving more details or editing those that you provied before makes
      your service better.
    </p>
  @endif
@stop
