@extends('layouts.edit')
@section('title')
  Basics - {{ $office->type }}, {{ $office->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'basics' ]) }}"><li class="active"><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'location' ]) }}"><li><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'photos' ]) }}"><li><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'pricing' ]) }}"><li><i class="material-icons left">receipt</i>Pricing</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'extras' ]) }}"><li><i class="material-icons left">star</i>Extras</li></a>
  </ul>
@stop

@section('content')
  <!-- Title -->
  <div class="title">
     <h5>Give more details</h5>
     <p  class="light">People can filter by listing basics to find a office they like. </p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Office Basics -->
  <form class="form row" form action="{{ route('office.router.update', ['hash' => $office->hash, 'route' => 'basics' ]) }}" method="POST">
    {{ csrf_field() }}

    <!-- Type  -->
    <div class="input-field col s4">
      <select name="type" required>
        <option value="" disabled selected>Choose one</option>
        <option value="All Building" @if($office->type == 'All Building') selected="selected" @endif> All Building</option>
        <option value="Bristro Cafe" @if($office->type == 'Bristro Cafe') selected="selected" @endif> Bristro Cafe </option>
        <option value="Executive Board/Room" @if($office->type == 'Executive Board/Room') selected="selected" @endif> Executive Board Room </option>
        <option value="Conference Board/Room" @if($office->type == 'Conference Board/Room') selected="selected" @endif> Conference Board Room </option>
        <option value="Meeting Room" @if($office->type == 'Meeting Room') selected="selected" @endif> Meeting Room </option>
        <option value="Co Working" @if($office->type == 'Co Working') selected="selected" @endif> Co Working</option>
        <option value="Project Rooms" @if($office->type == 'Project Rooms') selected="selected" @endif> Project Rooms</option>
        <option value="Phone Both" @if($office->type == 'Phone Both') selected="selected" @endif>  Phone Both </option>
      </select>
      <label>Type of Property</label>
    </div>
    <!-- Type -->

    <!-- Accomodance  -->
    <div class="input-field col s4">
      <select name="accomodance" required>
        <option value="" disabled selected>Choose one</option>
        <option value="Private" @if($office->accomodance == 'Private') selected="selected" @endif> Private</option>
        <option value="Shared" @if($office->accomodance == 'Shared') selected="selected" @endif>Shared</option>
      </select>
      <label>Accomodance</label>
    </div>
    <!-- Accomodance -->

    <!-- Capacity  -->
    <div class="input-field col s4">
      <select name="capacity" required>
        <option value="" disabled selected>Choose one</option>
        <option value="1" @if($office->capacity == '1') selected="selected" @endif> 1 </option>
        <option value="2" @if($office->capacity == '2') selected="selected" @endif> 2 </option>
        <option value="3" @if($office->capacity == '3') selected="selected" @endif> 3 </option>
        <option value="4" @if($office->capacity == '4') selected="selected" @endif> 4 </option>
        <option value="5" @if($office->capacity == '5') selected="selected" @endif> 5 </option>
        <option value="6" @if($office->capacity == '6') selected="selected" @endif> 6</option>
        <option value="7" @if($office->capacity == '7') selected="selected" @endif> 7</option>
        <option value="8" @if($office->capacity == '8') selected="selected" @endif> 8 </option>
        <option value="9" @if($office->capacity == '9') selected="selected" @endif> 6</option>
        <option value="10" @if($office->capacity == '10') selected="selected" @endif> 10</option>
        <option value="11" @if($office->capacity == '11') selected="selected" @endif> 11 </option>
        <option value="12" @if($office->capacity == '12') selected="selected" @endif> 12</option>
        <option value="13" @if($office->capacity == '13') selected="selected" @endif> 13</option>
        <option value="14" @if($office->capacity == '14') selected="selected" @endif> 14 </option>
        <option value="15" @if($office->capacity == '15') selected="selected" @endif> 15 </option>
        <option value="16" @if($office->capacity == '16') selected="selected" @endif> 16 </option>
        <option value="17" @if($office->capacity == '17') selected="selected" @endif> 17 </option>
        <option value="18" @if($office->capacity == '18') selected="selected" @endif> 18 </option>
        <option value="19" @if($office->capacity == '19') selected="selected" @endif> 19 </option>
        <option value="20" @if($office->capacity == '20') selected="selected" @endif> 20 </option>
        <option value="20+" @if($office->capacity == '20+') selected="selected" @endif> 20+ </option>
      </select>
      <label>Capacity</label>
    </div>
    <!-- Capacity -->

    <!-- Title -->
    <div class="input-field col s12">
      <input Placeholder="Type some cool title" id="title" type="text" name="title" required @if($office->title != 'null') value="{{ $office->title }}" @endif>
      <label class="active" for="title">Title</label>
    </div>
    <!-- Title -->

    <!-- Description -->
    <div class="input-field col s12">
      <input Placeholder="Type some cool description" id="description" type="text" name="description" required @if($office->description != 'null') value="{{ $office->description }}" @endif>
      <label class="active" for="description">Short Description</label>
    </div>
    <!-- Description -->

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
<!-- Uddate office Basics -->


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
