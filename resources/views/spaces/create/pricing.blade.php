@extends('layouts.edit')
@section('title')
  Photos - {{ $space->type }}, {{ $space->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('space.basics', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('space.description', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">border_color</i>Description</li></a>
    <a href="{{ route('space.location', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('space.photos', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('space.pricing', ['hash' => $space->hash ]) }}"><li class="active"><i class="material-icons left">receipt</i>Pricing</li></a>
    <a href="{{ route('space.extras', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">star</i>Extras</li></a>
  </ul>
@stop

@section('content')
  <!-- Title -->
  <div class="title">
     <h5>Pricing</h5>
     <p  class="light">Choose your own price. </p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Space Basics -->
  <form class="form row" form action="{{ route('space.pricing.update', ['hash' => $space->hash ]) }}" method="POST">
    {{ csrf_field() }}

  <!-- Price -->
  <div class="input-field col s6">
    <input Placeholder="Type a value here. Ex. 23.00" id="title" type="text" name="price" required @if($space->price != 'null') value="{{ $space->price }}" @endif>
    <label class="active" for="title">Price</label>
  </div>
  <!-- Price -->

  <!-- Type of Property -->
  <div class="input-field col s3">
    <select name="per" required>
      <option value="" disabled selected>Choose one</option>
      <option value="Night" @if($space->per == 'Night') selected="selected" @endif>Night </option>
      <option value="Hour" @if($space->per == 'Hour') selected="selected" @endif>Hour</option>
      <option value="Week" @if($space->per == 'Week') selected="selected" @endif>Week</option>
      <option value="Month" @if($space->per == 'Month') selected="selected" @endif>Month</option>
    </select>
    <label>Per?</label>
  </div>
  <!-- Type of Property -->

  <!-- Currency -->
  <div class="input-field col s3">
    <select name="currency" required >
      <option value="" disabled selected>Choose one</option>
      <option value="USD" @if($space->currency == 'USD') selected="selected" @endif>USD </option>
      <option value="COP" @if($space->currency == 'COP') selected="selected" @endif>COP</option>
    </select>
    <label>Currency</label>
  </div>
  <!-- Currency -->

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
