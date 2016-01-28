@extends('layouts.app')
@section('title', 'My Services')
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
      <li class="active"><a href="{{ url('/myservices') }}">Services</a></li>
    </ul>

  </div>
</nav>
</div>
</div>
<!-- Content -->
<section class="body" id="places">
<div class="container col s12">

  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">art_track</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">You don't have any service, start one clicking bellow! </p>
      <a href="{{ url('create') }}" class="btn btn-new">Create Service</a>
    </div>
  </div>



</div>
</section>
@stop
