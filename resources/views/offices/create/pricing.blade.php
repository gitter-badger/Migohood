@extends('layouts.edit')
@section('title')
  Photos - {{ $office->type }}, {{ $office->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'basics' ]) }}"><li><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'location' ]) }}"><li><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'photos' ]) }}"><li><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'pricing' ]) }}"><li class="active"><i class="material-icons left">receipt</i>Pricing</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'extras' ]) }}"><li><i class="material-icons left">star</i>Extras</li></a>
  </ul>
@stop

@section('content')
  <!-- Title -->
  <div class="title">
     <h5>Pricing</h5>
     <p  class="light">Choose your own price. </p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Office Pricing  -->
  <form class="form row" form action="{{ route('office.router.update', ['hash' => $office->hash, 'route' => 'pricing' ]) }}" method="POST">
    {{ csrf_field() }}

  <!-- Price -->
  <div class="input-field col s6">
    <input Placeholder="Type a value here. Ex. 23.00" id="title" type="text" name="price" required @if($office->price != 'null') value="{{ $office->price }}" @endif>
    <label class="active" for="title">Price</label>
  </div>
  <!-- Price -->

  <!-- Type of Property -->
  <div class="input-field col s3">
    <select name="per" required>
      <option value="" disabled selected>Choose one</option>
      <option value="Night" @if($office->per == 'Night') selected="selected" @endif>Night </option>
      <option value="Week" @if($office->per == 'Week') selected="selected" @endif>Week</option>
      <option value="Month" @if($office->per == 'Month') selected="selected" @endif>Month</option>
    </select>
    <label>Per?</label>
  </div>
  <!-- Type of Property -->

  <!-- Currency -->
  <div class="input-field col s3">
    <select name="currency" required >
      <option value="" disabled selected>Choose one</option>
      <option value="USD" @if($office->currency == 'USD') selected="selected" @endif>USD </option>
      <option value="COP" @if($office->currency == 'COP') selected="selected" @endif>COP</option>
    </select>
    <label>Currency</label>
  </div>
  <!-- Currency -->

  <!-- Submit -->
  <div class="col s12 submit">
    <div class="left">
      <a href="{{ route('office.show', ['hash' => $office->hash ]) }}" class="btn btn-back">
        @if($office->public == 'yes') Show @endif
      </a>
    </div>

    <div class="right">
      <button type="submit" class="btn btn-save" id="next">Save and Continue</button>
    </div>
  </div>
  <!-- Submit -->
</form>
<!-- Uddate Office Pricing  -->


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
      your Office better.
    </p>
  @endif
@stop
