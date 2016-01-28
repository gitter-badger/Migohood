@extends('layouts.app')
@section('title', 'Inbox')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li><a href="{{ url('/dashboard') }}" class="underline">Dashboard</a></li>
      <li class="active"><a href="{{ url('/inbox') }}">Inbox</a></li>
      <li><a href="{{ url('/myspaces') }}" class="underline">Spaces</a></li>
      <li><a href="{{ url('/myservices') }}" class="underline">Services</a></li>
    </ul>

  </div>
</nav>
</div>
</div>

@stop
