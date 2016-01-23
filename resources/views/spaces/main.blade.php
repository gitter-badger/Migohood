@extends('layouts.app')
@section('title')
  New Announce: {{ $previous->type }} - {{ $previous->accomodance }}
@stop
@section('content')

<!-- Options NavBar -->
<!--
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li class="active"><a href="{{ url('/create') }}">Basic Info</a></li>

    </ul>

  </div>
</nav>
</div>
</div>-->

<!-- Content -->
<section class="body" id="new">
  <div class="container col s12">

    <!-- Box -->
    <div class="box">
      <!-- Box-body -->
      <div class="box-body">
        <!--<div class="box-title">
          <i class="material-icons">description</i>General Information
        </div>-->

      <!-- Create_Form -->
      <div class="row" id="create_form">
        @include('forms.createSpace')
       </div>
      <!-- Create form -->
      </div>
      <!-- Box-body -->
    </div>
    <!-- Box -->

  </div>
</section>
@stop
