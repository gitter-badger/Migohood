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
      <li><a href="{{ url('/myoffices') }}" class="underlin">Offices</a></li>
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
      <a href="{{ url('/myspaces') }}"><li class="active"><i class="material-icons left">dns</i>All Spaces</li></a>
      <a href="{{ url('/myspaces/listed') }}"><li><i class="material-icons left">layers</i>Listed </li></a>
      <a href="{{ url('/myspaces/notlisted') }}"><li><i class="material-icons left">layers_clear</i>Not Listed</li></a>
    </ul>
 </div>
</div>
<!-- Menu Left -->

<div class="container col s10">

  @if (count($spaces)!=0)
  <!-- Unlisted places -->
  <div class="myplaces red">
    @foreach ($spaces->sortBydesc('created_at') as $space)
      @if ( $space->steps > 0 )
      <!-- Not Public -->
      <div class="unlisted-box row">
        <div class="col s2 img">
          <img src="{{ $space->thumbnail }}" alt="" />
        </div>
      </div>
      @endif
      {{ $space->type }}
    @endforeach
  </div>
  <!-- Unlisted places -->
  @else
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
  @endif
  </div>

</section>

@stop
