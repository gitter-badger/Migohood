@extends('layouts.app')
@section('title', 'Services')
@section('content')

<!-- Search NavBar -->
<div id="search">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper searchable">

    <form class="container row" action="/service/search" method="GET" role="search" id="search_box">
      {{ csrf_field() }}

      <div class="col s1">
        <i class="material-icons">search</i>
      </div>

      <div class="col s3">
        <input placeholder="What city do you want?" type="text" name="query_text">
      </div>

      <!-- Type  -->
      <div class="input-field col s3">
        <select name="type">
          <option value="" disabled selected>What are you looking for?</option>
          <option value='Turism'> Turism</option>
          <option value='Education'> Education</option>
          <option value='Culture'> Culture</option>
          <option value='Eco'> Eco</option>
          <option value='Recreation'> Recreation</option>
          <option value='Family'> Family</option>
          <option value='Pets'> Pets</option>
          <option value='Production'> Production</option>
          <option value='Personal'> Personal</option>
          <option value='Maintance'> Maintance</option>
          <option value='Promote'> Promote</option>
          <option value='Transportation'>Transportation</option>
          <option value='Other'> Other</option>
        </select>
      </div>
      <!-- Type -->

      <!-- Capacity  -->
      <div class="input-field col s2 last">
        <select name="capacity">
          <option value="" disabled selected>Capacity</option>
          <option value="1"> 1 Person</option>
          <option value="2"> 2 People</option>
          <option value="3"> 3 People</option>
          <option value="4"> 4 People</option>
          <option value="5"> 5 People</option>
          <option value="6"> 6 People</option>
          <option value="7"> 7 People</option>
          <option value="8"> 8 People</option>
          <option value="9"> 9 People</option>
          <option value="10"> 10 People</option>
          <option value="11"> 11 People</option>
          <option value="12"> 12 People</option>
          <option value="13"> 13 People</option>
          <option value="14"> 14 People</option>
          <option value="15"> 15 People</option>
          <option value="16"> 16 People</option>
          <option value="17"> 17 People</option>
          <option value="18"> 18 People</option>
          <option value="19"> 19 People</option>
          <option value="20"> 20 People</option>
          <option value="20+"> 20+ People</option>
        </select>
      </div>
      <!-- Capacity -->

      <div class="col s3">
        <button class="btn" type="submit">Search</button>
      </div>

    </form>

  </div>
</nav>
</div>
</div>
<!-- Search NavBar -->

<section class="results container row">

  @if (count($services) == 0)
  <!-- Box Nothing -->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">mood_bad</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">There are no Services that matchs with your search, start one clicking bellow! </p>
      <a href="{{ url('create/services') }}" class="btn btn-new">Create Service</a>
    </div>
  </div>
  <!-- Box Nothing -->
  @else

  <!-- Services -->
  @foreach ($services as $service)
  <div class="col s6">
    <div class="listed">
        <div class="listed_body row">
            <!-- Img -->
            <div class="col s4">
              <img class="materialboxed" src="{{ $service->thumbnail }}" alt="" />
            </div>

            <!-- Center -->
            <div class="col s4 listed_content row">
                <div class="col s12">
                  <h6 class="truncate">{{ $service->title }}</h6>
                  <p><span class="location"><i class="material-icons">location_on</i>{{ $service->country }}, {{ $service->city}}</span></p>
                  <p><span class="category service">
                    {{ $service->type }},
                      @if( $service->capacity == '1')
                        {{ $service->capacity }} Person
                      @else
                       {{ $service->capacity }} People
                      @endif
                  </span></p>
                </div>

                <div class="col s12 listed_content_bottom row">
                  <div class="col s4 boxy tooltipped" data-position="bottom" data-delay="50" data-tooltip="Stars">
                      {{ $service->stars }} <i class="material-icons stars">star</i>
                  </div>

                  <div class="col s4 boxy tooltipped" data-position="bottom" data-delay="50" data-tooltip="Recommends">
                      {{ $service->recommends }} <i class="material-icons recommends">favorite</i>
                  </div>

                  <div class="col s4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Comments">
                      {{ $service->comments }} <i class="material-icons comments">forum</i>
                  </div>
                </div>

            </div>

            <!-- Right-->
            <div class="col s4">
              <div class="listed_price">
                <div class="listed_price_content">
                    <h6>{{ $service->currency }}</h6>
                    <h5 class="truncate"><span>$</span>{{ $service->price }}</h5>
                    <p>Per {{ $service->per }}</p>
                    <a href="{{ route('service.show', ['hash' => $service->hash ]) }}" class="btn">Reserve</a><br>
                </div>
              </div>
            </div>

        </div>
    </div>


  </div>
  @endforeach
  <!-- Services -->

  <!-- Pagination -->
  <div class="col s12">
    <div class="center">
      {!! $services->render() !!}
    </div>
  </div>
  <!-- Pagination -->

  @endif

</section>


@stop
