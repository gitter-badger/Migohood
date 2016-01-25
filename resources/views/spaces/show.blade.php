@extends('layouts.app')
@section('title')
  Place - {{ $space->def_title }}
@stop
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li class="active"><a href="{{ url('') }}">Announce</a></li>
      <li><a href="{{ url('/inbox') }}" class="underline">Inbox</a></li>
      <li><a href="{{ url('/myspaces') }}" class="underline">Spaces</a></li>
      <li><a href="{{ url('/myservices') }}" class="underline">Services</a></li>
    </ul>

  </div>
</nav>
</div>
</div>

<!-- Content -->
<section class="body" id="place">
<div class="container col s12">
  <!-- Box -->
  <div class="box">
    <div class="box-body">



    </div>

  </div>
  <!-- Box -->

</div>
</section>
@stop
