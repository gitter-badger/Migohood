@extends('layouts.app')
@section('title', 'Offices')
@section('content')

<!-- Search NavBar -->
<div id="search">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper searchable">

    <form class="container row" action="/office/search" method="GET" role="search" id="search_box">
      {{ csrf_field() }}

      <div class="col s1">
        <i class="material-icons">search</i>
      </div>

      <div class="col s2">
        <input placeholder="What city do you want?" type="text" name="query_text">
      </div>

      <!-- Type  -->
      <div class="input-field col s3">
        <select name="type">
          <option value="" disabled selected>What are you looking for?</option>
          <option value="All Building"> All Building</option>
          <option value="Bristro Cafe"> Bristro Cafe </option>
          <option value="Executive Board/Room"> Executive Board Room </option>
          <option value="Conference Board/Room"> Conference Board Room </option>
          <option value="Meeting Room"> Meeting Room </option>
          <option value="Co Working"> Co Working</option>
          <option value="Project Rooms"> Project Rooms</option>
          <option value="Phone Both">  Phone Both </option>
        </select>
      </div>
      <!-- Type -->

      <!-- Accomodance -->
      <div class="input-field col s2">
        <select name="accomodance">
          <option value="" disabled selected>Accomodance</option>
          <option value="Private"> Private</option>
          <option value="Shared">Shared</option>
        </select>
      </div>
      <!-- Accomodance -->

      <!-- Capacity  -->
      <div class="input-field col s2 last">
        <select name="capacity">
          <option value="" disabled selected>Capacity</option>
          <option value="1"> 1 Employee</option>
          <option value="2"> 2 Employees</option>
          <option value="3"> 3 Employees</option>
          <option value="4"> 4 Employees</option>
          <option value="5"> 5 Employees</option>
          <option value="6"> 6 Employees</option>
          <option value="7"> 7 Employees</option>
          <option value="8"> 8 Employees</option>
          <option value="9"> 9 Employees</option>
          <option value="10"> 10 Employees</option>
          <option value="11"> 11 Employees</option>
          <option value="12"> 12 Employees</option>
          <option value="13"> 13 Employees</option>
          <option value="14"> 14 Employees</option>
          <option value="15"> 15 Employees</option>
          <option value="16"> 16 Employees</option>
          <option value="17"> 17 Employees</option>
          <option value="18"> 18 Employees</option>
          <option value="19"> 19 Employees</option>
          <option value="20"> 20 Employees</option>
          <option value="20+"> 20+ Employees</option>
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

  @if (count($offices) == 0)
  <!-- Box Nothing -->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">mood_bad</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">There are no offices that matchs with your search, start one clicking bellow! </p>
      <a href="{{ url('create/spaces') }}" class="btn btn-new">Create Office</a>
    </div>
  </div>
  <!-- Box Nothing -->
  @else

  <!-- Offices -->
  @foreach ($offices as $office)
  <div class="col s6">
    <div class="listed">
        <div class="listed_body row">
            <!-- Img -->
            <div class="col s4">
              <img class="materialboxed" src="{{ $office->thumbnail }}" alt="" />
            </div>

            <!-- Center -->
            <div class="col s4 listed_content row">
                <div class="col s12">
                  <h6 class="truncate">{{ $office->title }}</h6>
                  <p><span class="location"><i class="material-icons">location_on</i>{{ $office->country }}, {{ $office->city}}</span></p>
                  <p><span class="category office">{{ $office->type }} -  {{ $office->accomodance }}</span></p>
                </div>

                <div class="col s12 listed_content_bottom row">
                  <div class="col s4 boxy tooltipped" data-position="bottom" data-delay="50" data-tooltip="Stars">
                      {{ $office->stars }} <i class="material-icons stars">star</i>
                  </div>

                  <div class="col s4 boxy tooltipped" data-position="bottom" data-delay="50" data-tooltip="Recommends">
                      {{ $office->recommends }} <i class="material-icons recommends">favorite</i>
                  </div>

                  <div class="col s4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Comments">
                      {{ $office->comments }} <i class="material-icons comments">forum</i>
                  </div>
                </div>

            </div>

            <!-- Right-->
            <div class="col s4">
              <div class="listed_price">
                <div class="listed_price_content">
                    <h6>{{ $office->currency }}</h6>
                    <h5 class="truncate"><span>$</span>{{ $office->price }}</h5>
                    <p>Per {{ $office->per }}</p>
                    <a href="{{ route('office.show', ['hash' => $office->hash ]) }}" class="btn">Reserve</a><br>
                </div>
              </div>
            </div>

        </div>
    </div>


  </div>
  @endforeach
  <!-- Offices -->

  <!-- Pagination -->
  <div class="col s12">
    <div class="center">
      {!! $offices->render() !!}
    </div>
  </div>
  <!-- Pagination -->

  @endif

</section>


@stop
