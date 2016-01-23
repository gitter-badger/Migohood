@extends('layouts.app')
@section('title', 'My Spaces')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li><a href="{{ url('/dashboard') }}"  class="underline">Dashboard</a></li>
      <li><a href="{{ url('/inbox') }}"  class="underline">Inbox</a></li>
      <li  class="active"><a href="{{ url('/myspaces') }}">Spaces</a></li>
      <li><a href="{{ url('/myservices') }}" class="underline">Services</a></li>
    </ul>

  </div>
</nav>
</div>
</div>

@stop
