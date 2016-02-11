@extends('layouts.app')
@section('title')
  {{ $space->type }} - {{ $space->accomodance }}
    in {{ $space->city }}, {{ $space->country }}
@stop
@section('header')
  <link href="/css/ninja-slider.css" rel="stylesheet" type="text/css" />
  <script src="/js/ninja-slider.js" type="text/javascript"></script>
@stop
@section('content')


@if(Auth::user()->id  != $space->user_id)
<!-- Reserve NavBar -->
<div id="search">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper reservable">

    <form class="container row" action="/space/search"  role="search" id="search_box">
      {{ csrf_field() }}

      <div class="col s1">
        <i class="material-icons">flight_land</i>
      </div>

      <div class="col s2">
        <input placeholder="Check In" type="date" name="check_in" class="datepicker">
      </div>

      <div class="col s1">
        <i class="material-icons">flight_takeoff</i>
      </div>

      <div class="col s2">
        <input  placeholder="Check Out" type="date" name="check_out" class="datepicker">
      </div>

      <div class="col s1">
        <i class="material-icons">group_add</i>
      </div>

      <!-- Capacity  -->
      <div class="input-field col s2 last">
        <select name="capacity">
          <option value="" disabled selected>Capacity</option>
          <option value="1"> 1 Guest</option>
          <option value="2"> 2 Guests</option>
          <option value="3"> 3 Guests</option>
          <option value="4"> 4 Guests</option>
          <option value="5"> 5 Guests</option>
          <option value="6"> 6 Guests</option>
          <option value="7"> 7 Guests</option>
          <option value="8"> 8 Guests</option>
          <option value="9"> 6 Guests</option>
          <option value="10"> 10 Guests</option>
          <option value="11"> 11 Guests</option>
          <option value="12"> 12 Guests</option>
          <option value="13"> 13 Guests</option>
          <option value="14"> 14 Guests</option>
          <option value="15"> 15 Guests</option>
          <option value="16"> 16 Guests</option>
          <option value="16+"> 16+ Guests </option>
        </select>
      </div>
      <!-- Capacity -->

      <div class="col s2">
        <button class="btn" type="submit">Book Now!</button>
      </div>

    </form>

  </div>
</nav>
</div>
</div>
<!-- Reserve NavBar -->
@endif

<section class="row show">
  <!-- Pictures -->
  <div class="col s4">
     <div id="ninja-slider">
         <div class="slider-inner">
             <ul>
                <li><a class="ns-img" href='{{ $space->thumbnail }}'></a></li>
               @foreach ($photos as $photo)
                <li><a class="ns-img" href='{{ $photo->path }}'></a></li>
               @endforeach
             </ul>
             <div class="fs-icon" title="Expand/Close"></div>
         </div>
     </div>
   </div>
   <!-- Pictures -->

   <div class="col s4">
     <h4> {{ $space->title }}</h4>
      <p><span class="stars">
        <!-- Conditions here -->
        <i class="material-icons filled">star</i>
        <i class="material-icons filled">star</i>
        <i class="material-icons filled">star</i>
        <i class="material-icons not_filled">star</i>
        <i class="material-icons not_filled">star</i>
      </span></p>

     <p><span class="location"><i class="material-icons">location_on</i>{{ $space->country }}, {{ $space->city}}</span></p>
     <p><span class="category space">{{ $space->type }} -  {{ $space->accomodance }}</span></p>

   </div>

   <div class="col s4 show-pŕice">
     a
   </div>



    @if(Auth::user()->id  == $space->user_id)
      <a href=" {{ route('space.router', ['hash' => $space->hash, 'route' => 'basics' ]) }}">Edit</a>

    @else
      <a href=" #">reserve</a>
   @endif

</section>
@stop
