@extends('layouts.app')
@section('title', 'Spaces Listed')
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
      <a href="{{ url('/myspaces') }}"><li><i class="material-icons left">layers</i>Listed </li></a>
      <a href="{{ url('/myspaces/notlisted') }}"><li class="active"><i class="material-icons left">layers_clear</i>Not Listed</li></a>
    </ul>
 </div>
</div>
<!-- Menu Left -->

<div class="container col s10">
  @if (count($spaces) == 0)
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
  <div class="row">
  <!-- Notlisted Spaces -->
  @foreach ($spaces as $space)
    <div class="col s3">
      <div class="not_listed">
        <div class="not_listed_body">
          <img class="materialboxed" src="{{ $space->thumbnail }}" alt="" />
          <div class="not_listed_content center">
            <h6 class="light">{{ $space->type }} , {{ $space->accomodance }}</h6>
            <span>Last Updated {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $space->updated_at)->diffForHumans() }} </span>
            <a href="{{ url($space->notpublic) }}" class="btn">Continue Editing</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  <!-- Notlisted Spaces -->
  </div>

  @endif
</div>
</section>

@stop
