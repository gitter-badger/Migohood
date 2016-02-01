@extends('layouts.app')
@section('title', 'Services Listed')
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
      <li><a href="{{ url('/myoffices') }}" class="underline">Offices</a></li>
      <li class="active"><a href="{{ url('/myservices') }}">Services</a></li>
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
      <a href="{{ url('/myservices') }}"><li><i class="material-icons left">dns</i>All Services</li></a>
      <a href="{{ url('/myservices/listed') }}"><li class="active"><i class="material-icons left">layers</i>Listed </li></a>
      <a href="{{ url('/myservices/notlisted') }}"><li><i class="material-icons left">layers_clear</i>Not Listed</li></a>
    </ul>
 </div>
</div>
<!-- Menu Left -->

<div class="container col s10">

  <!-- Box Nothing -->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">receipt</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">You don't have any service, start one clicking bellow! </p>
      <a href="{{ url('create/services') }}" class="btn btn-new">Create Service</a>
    </div>
  </div>
  <!-- Box Nothing -->

  </div>

</section>
@stop
