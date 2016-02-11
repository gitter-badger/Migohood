@extends('layouts.app')
@section('title', 'Spaces')
@section('content')

<!-- Search NavBar -->
<div id="search">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper searchable">

    <form class="container row" action="/space/search" method="GET" role="search" id="search_box">
      {{ csrf_field() }}

      <div class="col s1">
        <i class="material-icons">search</i>
      </div>

      <div class="col s2">
        <input placeholder="What city do you go?" type="text" name="query_text">
      </div>

      <!-- Type  -->
      <div class="input-field col s3">
        <select name="type">
          <option value="" disabled selected>What are you looking for?</option>
          <option value="Department">Department</option>
          <option value="House" >House</option>
          <option value="Bed and Breakfast">Bed &amp; Breakfast </option>
          <option value="Apartment"> Apartment</option>
          <option value="Loft"> Loft</option>
          <option value="Townhouse"> Townhouse</option>
          <option value="Condominium"> Condominium</option>
          <option value="Bungalow"> Bungalow</option>
          <option value="Cabin"> Cabin</option>
          <option value="Villa"> Villa</option>
          <option value="Castle"> Castle</option>
          <option value="Dorm"> Dorm</option>
          <option value="Treehouse"> Treehouse </option>
          <option value="Boat"> Boat </option>
          <option value="Plane"> Plane </option>
          <option value="Camper/RV">Camper/RV </option>
          <option value="Igloo">Igloo</option>
          <option value="LightHouse">LightHouse</option>
          <option value="Yurt">Yurt</option>
          <option value="Cave">Cave</option>
          <option value="Island">Island</option>
          <option value="Chalet">Chalet</option>
          <option value="Train">Train</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <!-- Type -->

      <!-- Accomodance -->
      <div class="input-field col s2">
        <select name="accomodance">
          <option value="" disabled selected>Accomodance</option>
          <option value="All Space">All Space</option>
          <option value="Private Room">Private Room</option>
          <option value="Shared Room">Shared Room</option>
        </select>
      </div>
      <!-- Accomodance -->

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
        <button class="btn" type="submit">Search</button>
      </div>

    </form>

  </div>
</nav>
</div>
</div>
<!-- Search NavBar -->

<section class="results container row">

  @if (count($spaces) == 0)
  <!-- Box Nothing -->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">mood_bad</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">There are no spaces that matchs with your search, start one clicking bellow! </p>
      <a href="{{ url('create/spaces') }}" class="btn btn-new">Create Space</a>
    </div>
  </div>
  <!-- Box Nothing -->
  @else

  <!-- Spaces -->
  @foreach ($spaces as $space)
  <div class="col s6">
    <div class="listed">
        <div class="listed_body row">
            <!-- Img -->
            <div class="col s4">
              <img class="materialboxed" src="{{ $space->thumbnail }}" alt="" />
            </div>

            <!-- Center -->
            <div class="col s4 listed_content row">
                <div class="col s12">
                  <h6 class="truncate">{{ $space->title }}</h6>
                  <p><span class="location"><i class="material-icons">location_on</i>{{ $space->country }}, {{ $space->city}}</span></p>
                  <p><span class="category space">{{ $space->type }} -  {{ $space->accomodance }}</span></p>
                </div>

                <div class="col s12 listed_content_bottom row">
                  <div class="col s4 boxy tooltipped" data-position="bottom" data-delay="50" data-tooltip="Stars">
                      {{ $space->stars }} <i class="material-icons stars">star</i>
                  </div>

                  <div class="col s4 boxy tooltipped" data-position="bottom" data-delay="50" data-tooltip="Recommends">
                      {{ $space->recommends }} <i class="material-icons recommends">favorite</i>
                  </div>

                  <div class="col s4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Comments">
                      {{ $space->comments }} <i class="material-icons comments">forum</i>
                  </div>
                </div>

            </div>

            <!-- Right-->
            <div class="col s4">
              <div class="listed_price">
                <div class="listed_price_content">
                    <h6>{{ $space->currency }}</h6>
                    <h5 class="truncate"><span>$</span>{{ $space->price }}</h5>
                    <p>Per {{ $space->per }}</p>
                    <a href="{{ route('space.show', ['hash' => $space->hash ]) }}" class="btn">Show</a><br>                    
                </div>
              </div>
            </div>

        </div>
    </div>


  </div>
  @endforeach
  <!-- Spaces -->

  <!-- Pagination -->
  <div class="col s12">
    <div class="center">
      {!! $spaces->render() !!}
    </div>
  </div>
  <!-- Pagination -->

  @endif

</section>


@stop
