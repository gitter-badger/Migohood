@extends('layouts.app')
@section('title', 'My Spaces')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li  class="active"><a href="{{ url('/myspaces') }}">Spaces</a></li>
      <li><a href="{{ url('/myservices') }}" class="underline">Services</a></li>
      <li><a href="{{ url('/dashboard') }}"  class="underline">Dashboard</a></li>
      <li><a href="{{ url('/inbox') }}"  class="underline">Inbox</a></li>      
    </ul>

  </div>
</nav>
</div>
</div>
<!-- Content -->
<section class="body" id="place">
<div class="container col s12">
<!-- Box -->
@foreach ($places->sortBy('created_at') as $place)
<div class="box">
<div class="box-body places">
  <div class="place-box row">
      <div class="col s3">
          <img src="{{ $place->thumbnail }}" alt="" />
      </div>
      <div class="col s5">
        <h5 class="light">{{ $place->def_title }}</h5>
        <p class="light">{{ $place->created_at->diffForHumans() }}</p>
      </div>
      <div class="col s4 green">
        <a href="#"></a>
      </div>
  </div>
</div>
</div>
  @endforeach
<!-- Box -->

</div>
</section>

@stop
