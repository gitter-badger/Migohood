@extends('layouts.app')
@section('title', 'Dashboard')
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

<section class="body row">
  <div class="container">
    
    <div class="col s3 profiler">
      <div class="profiler_body ">
        <img src ="{{ url(Auth::user()->avatar) }}" alt="..."/>
        <h6>{{ Auth::user()->name }} </h6>
      </div>

      <br>

      <div class="box">
        <div class="box-body">
          <div class="box-title">
            <i class="material-icons">person_pin</i>Basic Information
          </div>


        </div>
      </div>
    </div>

    <div class="col s9">
      <div class="box">
        <div class="box-body">
          <div class="box-title">
            <i class="material-icons">person_pin</i>Basic Information
          </div>


        </div>
      </div>
    </div>
  </div>

  <!--
  <div class="box">

    <div class="box-body">
      <div class="box-title">
        <i class="material-icons">person_pin</i>Basic Information
      </div>


    </div>

  </div>-->
</section>
@stop
