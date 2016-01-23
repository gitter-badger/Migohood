@extends('layouts.app')
@section('title', 'Profile Settings')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li class="active"><a href="{{ url('/settings/profile') }}">Profile</a></li>
      <li><a href="#" class="underline">Account</a></li>
      <li><a href="#" class="underline">Security</a></li>
    </ul>

  </div>
</nav>
</div>
</div>

<!-- Content -->
<section class="body">
<div class="container col s12">
  <!-- Box -->
  <div class="box">
    <!-- Box-body -->
    <div class="box-body">
      <div class="box-title">
        <i class="material-icons">person_pin</i>Basic Information
      </div>


    </div>
    <!-- Box-body -->
  </div>
  <!-- Box -->
</div>
</section>
@stop
