@extends('layouts.app')
@section('title', 'My Spaces')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li><a href="{{ url('/dashboard') }}" class="underline">Dashboard</a></li>
      <li><a href="{{ url('/inbox') }}" class="underline">Inbox</a></li>
      <li class="active"><a href="{{ url('/myspaces') }}">Spaces</a></li>
      <li><a href="{{ url('/myservices') }}" class="underline">Services</a></li>
    </ul>

  </div>
</nav>
</div>
</div>
<!-- Content -->
<section class="body" id="places">
<div class="container col s12">


@if (count($places) > 0)
  <!-- My places -->
  <div class="myplaces">
    @foreach ($places->sortBydesc('created_at') as $place)
      <!-- Place -->
      <div class="place-box row">

        <!-- Left -->
        <div class="col s3 img">
          <img src="{{ $place->thumbnail }}" alt="" />
          <div class="change">
            <a href="#" class="btn">Change</a>
          </div>
        </div>
        <!-- Left -->

        <!-- Center -->
        <div class="col s7 row">
          <!-- Top -->
          <div class="col s12 top">
              <h6 class="truncate first">{{ $place->city }}, {{ $place->country }} </h6>
              <h6 class="truncate light second">{{ $place->title }}</h6>
              @if($place->other=='NULL')
                <h6 class="third"><span>{{ $place->type }} - {{ $place->accomodance }}</span></h6>
              @else
                <h6 class="third"><span>{{ $place->other }} - {{ $place->accomodance }}</span></h6>
              @endif
          </div>
          <!-- Top -->

          <!-- Middle -->
          <div class="col s12 middle">
            <p class="truncate light">{{ $place->description }}</p>
          </div>
          <!-- Middle -->

          <!-- Bottom -->
          <div class="col s12 bottom row">

            <div class="col s3 boxy row">
              {{ $place->capacity }}
              <i class="material-icons">group_add</i>
            </div>

            <div class="col s3 boxy">
              {{ $place->bedrooms }}
               <i class="material-icons">store_mall_directory</i>
            </div>

            <div class="col s3 boxy">
              {{ $place->beds }}
              <i class="material-icons">hotel</i>
            </div>

            <div class="col s3 boxy last">
              {{ $place->bathrooms }}
              <i class="material-icons">hot_tub</i>
            </div>

            <div class="col s3 tag row">
              Capacity
            </div>

            <div class="col s3 tag row">
              Bedrooms
            </div>

            <div class="col s3 tag row">
              Beds
            </div>

            <div class="col s3 tag row">
              Bathrooms
            </div>


          </div>

        </div>
        <!-- Center -->

        <!-- Right -->
        <div class="col s2 price">
            <div class="price-body">
                <h5 class="truncate light">{{ $place->price }}</h5>
                <p class="second">{{ $place->coin }}</p>
                <p class="third light">per {{ $place->per }}</p>
            </div>
            <a href="#" class="btn">View</a>
        </div>
        <!-- Right -->
    </div>
   @endforeach
  </div>
  <!-- My places -->

@else
<!-- Box Nothing-->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">art_track</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">You don't have any space, start one clicking bellow! </p>
      <a href="{{ url('create') }}" class="btn btn-new">Create Space</a>
    </div>
  </div>
@endif


<!--
<div class="box">
<div class="box-body places">
  <div class="place-box row">
      <div class="col s3">
          <img src="{{ $place->thumbnail }}" alt="" />
      </div>
      <div class="col s5">
        <h5 class="light">{{ $place->title }}</h5>
        <h5 class="light">{{ $place->description }}</h5>
        <p class="light">{{ $place->created_at->diffForHumans() }}</p>
      </div>
      <div class="col s4 green">
        <a href="#"></a>
      </div>
  </div>
</div>
</div>-->

<!-- Box -->

</div>
</section>

@stop
