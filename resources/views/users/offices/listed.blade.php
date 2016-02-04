@extends('layouts.app')
@section('title', 'Offices Listed')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li><a href="{{ url('/dashboard') }}" class="underline">Dashboard</a></li>
      <li><a href="{{ url('/inbox') }}" class="underline">Inbox</a></li>
      <li><a href="{{ url('/myspaces') }}" class="underline">Spaces</a></li>
      <li class="active"><a href="{{ url('/myoffices') }}">Offices</a></li>
      <li><a href="{{ url('/myservices') }}" class="underline">Services</a></li>
    </ul>

  </div>
</nav>
</div>
</div>
<!-- Content -->
<section class="body row">

<!-- Menu Left -->
<div class="col s2">
  <div class="menu container">
    <ul>
      <a href="{{ url('/myoffices') }}"><li class="active"><i class="material-icons left">layers</i>Listed </li></a>
      <a href="{{ url('/myoffices/notlisted') }}"><li><i class="material-icons left">layers_clear</i>Not Listed</li></a>
    </ul>
 </div>
</div>
<!-- Menu Left -->

<div class="container col s10">
  @if (count($offices) == 0)
  <!-- Box Nothing -->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">location_city</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">You don't have any space, start one clicking bellow! </p>
      <a href="{{ url('create/spaces') }}" class="btn btn-new">Create Space</a>
    </div>
  </div>
  <!-- Box Nothing -->
  @else

  <div class="myplaces">
    @foreach ($offices as $office)
      <!-- Place -->
      <div class="place-box row">

        <!-- Left -->
        <div class="col s3 img">
          <img src="{{ $office->thumbnail }}" alt="" />
          <div class="change">
            <a href="{{ route('office.edit', ['hash' => $office->hash ]) }} " class="btn">Edit</a>
          </div>
        </div>
        <!-- Left -->

        <!-- Center -->
        <div class="col s6 row">
          <!-- Top -->
          <div class="col s12 top">
              <h6 class="truncate first">{{ $office->city }}, {{ $office->country }} </h6>
              <h6 class="truncate light second">{{ $office->title }}</h6>
              <h6 class="third"><span>{{ $office->type }} - {{ $office->accomodance }}</span></h6>
          </div>
          <!-- Top -->

          <!-- Middle -->
          <div class="col s12 middle">
            <p class="truncate light">{{ $office->description }}</p>
          </div>
          <!-- Middle -->

          <!-- Bottom -->
          <div class="col s12 bottom row">

            <div class="col s3 boxy row">
              {{ $office->capacity }}
              <i class="material-icons">group_add</i>
            </div>

            <div class="col s3 boxy">
                {{ $office->wifi }}
               <i class="material-icons">perm_scan_wifi</i>
            </div>

            <div class="col s3 boxy">
              {{ $office->tv_cable }}
              <i class="material-icons">tv</i>
            </div>

            <div class="col s3 boxy last">
              {{ $office->bathroom }}
              <i class="material-icons">hot_tub</i>
            </div>

            <div class="col s3 tag row">
              Capacity
            </div>

            <div class="col s3 tag row">
              Meeting Room
            </div>

            <div class="col s3 tag row">
              TV Cable
            </div>

            <div class="col s3 tag row">
              Bathrooms
            </div>


          </div>
          <!-- Bottom -->

        </div>
        <!-- Center -->

        <!-- Right -->
        <div class="col s3 price">
          <div class="price-body">
            <h5 class="truncate light">{{ $office->price }}</h5>
            <p class="second">{{ $office->currency }}</p>
            <p class="third light">per {{ $office->per }}</p>
          </div>
          <a href="{{ route('office.show', ['hash' => $office->hash ]) }}" class="btn">Open</a>
        </div>
        <!-- Right -->
    </div>
   @endforeach
  </div>
  <!-- My places -->


  @endif
</div>
</section>

@stop
