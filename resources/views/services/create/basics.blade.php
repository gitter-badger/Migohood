@extends('layouts.edit')
@section('title')
  Basics - {{ $service->type }}, {{ $service->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'basics' ]) }}"><li class="active"><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'location' ]) }}"><li><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'photos' ]) }}"><li><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'pricing' ]) }}"><li><i class="material-icons left">receipt</i>Pricing</li></a>
  </ul>
@stop

@section('content')
  <!-- Title -->
  <div class="title">
     <h5>Give more details</h5>
     <p  class="light">People can filter by listing basics to find a service they like. </p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Service Basics -->
  <form class="form row" form action="{{ route('service.router.update', ['hash' => $service->hash, 'route' => 'basics' ]) }}" method="POST">
    {{ csrf_field() }}

    <!-- Type  -->
    <div class="input-field col s6">
      <select name="type" required>
        <option value="" disabled selected>Choose one</option>
        <option value="Turism" @if($service->type == 'Turism') selected="selected" @endif> Turism</option>
        <option value="Education" @if($service->type == 'Education') selected="selected" @endif> Education</option>
        <option value="Culture" @if($service->type == 'Culture') selected="selected" @endif> Culture</option>
        <option value="Eco" @if($service->type == 'Eco') selected="selected" @endif> Eco</option>
        <option value='Recreation' @if($service->type == 'Recreation') selected="selected" @endif> Recreation</option>
        <option value='Family' @if($service->type == 'Family') selected="selected" @endif> Family</option>
        <option value='Pets' @if($service->type == 'Pets') selected="selected" @endif> Pets</option>
        <option value='Production' @if($service->type == 'Production') selected="selected" @endif> Production</option>
        <option value='Personal' @if($service->type == 'Personal') selected="selected" @endif> Personal</option>
        <option value='Maintance' @if($service->type == 'Maintance') selected="selected" @endif> Maintance</option>
        <option value='Promote' @if($service->type == 'Promote') selected="selected" @endif> Promote</option>
        <option value='Transportation' @if($service->type == 'Transportation') selected="selected" @endif>Transportation</option>
        <option value='Other' @if($service->type == 'Other') selected="selected" @endif> Other</option>
      </select>
      <label>Type of Property</label>
    </div>
    <!-- Type -->

    <!-- Capacity  -->
    <div class="input-field col s6">
      <select name="capacity" required>
        <option value="" disabled selected>Choose one</option>
        <option value="1" @if($service->capacity == '1') selected="selected" @endif> 1 </option>
        <option value="2" @if($service->capacity == '2') selected="selected" @endif> 2 </option>
        <option value="3" @if($service->capacity == '3') selected="selected" @endif> 3 </option>
        <option value="4" @if($service->capacity == '4') selected="selected" @endif> 4 </option>
        <option value="5" @if($service->capacity == '5') selected="selected" @endif> 5 </option>
        <option value="6" @if($service->capacity == '6') selected="selected" @endif> 6</option>
        <option value="7" @if($service->capacity == '7') selected="selected" @endif> 7</option>
        <option value="8" @if($service->capacity == '8') selected="selected" @endif> 8 </option>
        <option value="9" @if($service->capacity == '9') selected="selected" @endif> 6</option>
        <option value="10" @if($service->capacity == '10') selected="selected" @endif> 10</option>
        <option value="11" @if($service->capacity == '11') selected="selected" @endif> 11 </option>
        <option value="12" @if($service->capacity == '12') selected="selected" @endif> 12</option>
        <option value="13" @if($service->capacity == '13') selected="selected" @endif> 13</option>
        <option value="14" @if($service->capacity == '14') selected="selected" @endif> 14 </option>
        <option value="15" @if($service->capacity == '15') selected="selected" @endif> 15 </option>
        <option value="16" @if($service->capacity == '16') selected="selected" @endif> 16 </option>
        <option value="17" @if($service->capacity == '17') selected="selected" @endif> 17 </option>
        <option value="18" @if($service->capacity == '18') selected="selected" @endif> 18 </option>
        <option value="19" @if($service->capacity == '19') selected="selected" @endif> 19 </option>
        <option value="20" @if($service->capacity == '20') selected="selected" @endif> 20 </option>
        <option value="20+" @if($service->capacity == '20+') selected="selected" @endif> 20+ </option>
      </select>
      <label>Capacity</label>
    </div>
    <!-- Capacity -->

    <!-- Title -->
    <div class="input-field col s12">
      <input Placeholder="Type some cool title" id="title" type="text" name="title" required @if($service->title != 'null') value="{{ $service->title }}" @endif>
      <label class="active" for="title">Title</label>
    </div>
    <!-- Title -->

    <!-- Description -->
    <div class="input-field col s12">
      <input Placeholder="Type some cool description" id="description" type="text" name="description" required @if($service->description != 'null') value="{{ $service->description }}" @endif>
      <label class="active" for="description">Short Description</label>
    </div>
    <!-- Description -->

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
<!-- Uddate Service Basics -->


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
