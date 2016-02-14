@extends('layouts.app')
@section('title', 'Dashboard - Pending Approval')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li class="active"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
      <li><a href="{{ url('/inbox') }}" class="underline">Inbox</a></li>
      <li><a href="{{ url('/myspaces') }}" class="underline">Spaces</a></li>
      <li><a href="{{ url('/myoffices') }}" class="underline">Offices</a></li>
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
      <a href="{{ url('/dashboard') }}"><li><i class="material-icons left">developer_board</i>Dashboard</li></a>
      <a href="{{ url('/dashboard/reservations') }}"><li><i class="material-icons left">date_range</i>Reservations </li></a>
      <a href="{{ url('/dashboard/my_rents') }}"><li><i class="material-icons left">event_note</i>My Rents </li></a>
      <a href="{{ url('/dashboard/pending_approval') }}"><li class="active"><i class="material-icons left">event_available</i>Pending Approval </li></a>
      <a href="{{ url('/dashboard/pending_payment') }}"><li><i class="material-icons left">event</i>Pending Payment </li></a>
      <a href="{{ url('/dashboard/transactions') }}"><li><i class="material-icons left">history</i>Transactions </li></a>
    </ul>
 </div>
</div>
<!-- Menu Left -->

<div class="container col s10">


  <!-- Box Nothing -->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">event_available</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">You don't have any reservation pending for approval</p>
    </div>
  </div>
  <!-- Box Nothing -->

  </div>

</section>

@stop
