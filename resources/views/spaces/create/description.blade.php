@extends('layouts.edit')
@section('title')
  Description - {{ $space->type }}, {{ $space->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('space.basics', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('space.description', ['hash' => $space->hash ]) }}"><li class="active"><i class="material-icons left">border_color</i>Description</li></a>
    <a href="{{ route('space.location', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('space.photos', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('space.pricing', ['hash' => $space->hash ]) }}"><li><i class="material-icons left">receipt</i>Pricing</li></a>
    <!--<a href="#"><li><i class="material-icons left">star</i>Extras</li></a>-->
  </ul>
@stop

@section('content')
  <!-- Title -->
  <div class="title">
     <h5>Describe your place</h5>
     <p  class="light">Many people fall in love because of the details, what if you provide a cool
     and original description of the place that you're offering? </p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Space Basics -->
  <form class="form row" form action="{{ route('space.description.update', ['hash' => $space->hash ]) }}" method="POST">
    {{ csrf_field() }}

  <!-- Title -->
  <div class="input-field col s12">
    <input Placeholder="Type some cool title" id="title" type="text" name="title" required @if($space->description != 'null') value="{{ $space->title }}" @endif>
    <label class="active" for="title">Title</label>
  </div>
  <!-- Title -->

  <!-- Description -->
  <div class="input-field col s12">
    <input Placeholder="Type some cool description" id="description" type="text" name="description" required @if($space->description != 'null') value="{{ $space->description }}" @endif>
    <label class="active" for="description">Description</label>
  </div>
  <!-- Description -->

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
