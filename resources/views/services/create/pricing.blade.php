@extends('layouts.edit')
@section('title')
  Photos - {{ $service->type }}, {{ $service->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'basics' ]) }}"><li><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'location' ]) }}"><li><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'photos' ]) }}"><li><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'pricing' ]) }}"><li class="active"><i class="material-icons left">receipt</i>Pricing</li></a>
  </ul>
@stop

@section('content')
  <!-- Title -->
  <div class="title">
     <h5>Pricing</h5>
     <p  class="light">Choose your own price. </p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Service Pricing  -->
  <form class="form row" form action="{{ route('service.router.update', ['hash' => $service->hash, 'route' => 'pricing' ]) }}" method="POST">
    {{ csrf_field() }}

  <!-- Price -->
  <div class="input-field col s6">
    <input Placeholder="Type a value here. Ex. 23.00" id="title" type="text" name="price" required @if($service->price != 'null') value="{{ $service->price }}" @endif>
    <label class="active" for="title">Price</label>
  </div>
  <!-- Price -->

  <!-- Type of Property -->
  <div class="input-field col s3">
    <select name="per" required>
      <option value="" disabled selected>Choose one</option>
      <option value="Night" @if($service->per == 'Night') selected="selected" @endif>Night </option>
      <option value="Week" @if($service->per == 'Week') selected="selected" @endif>Week</option>
      <option value="Month" @if($service->per == 'Month') selected="selected" @endif>Month</option>
    </select>
    <label>Per?</label>
  </div>
  <!-- Type of Property -->

  <!-- Currency -->
  <div class="input-field col s3">
    <select name="currency" required >
      <option value="" disabled selected>Choose one</option>
      <option value="USD" @if($service->currency == 'USD') selected="selected" @endif>USD </option>
      <option value="COP" @if($service->currency == 'COP') selected="selected" @endif>COP</option>
    </select>
    <label>Currency</label>
  </div>
  <!-- Currency -->

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
<!-- Uddate Service Pricing  -->


@stop

@section('info')
  @if($service->public == 'no')
    <img src="/img/app/space.png" alt="" />
      <h4 class="light">It's done</h4>
      <p class="light">
        Your new Service has been created, but.. It's not public yet. Please proceed to next steps
        to have your Service available for rent.
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
