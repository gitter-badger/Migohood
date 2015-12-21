@extends('layouts.site')
@section('title', 'MigoHood | Alquila y alójate con anfitriones alrededor del Mundo')
@section('header')
  <link href="/css/site.css" rel="stylesheet">    <!-- Style core CSS -->                   
@stop
@section('content')
<body id="home">
<!-- NAVBAR -->
<nav class="white" role="navigation">
  <div class="nav-wrapper">
    <!--<a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">dehaze</i></a>-->

    <ul class=" hide-on-med-and-down">
      <ul class="left">
        <li><a href="{{ url('/') }}"><img id="brand" src="/img/logo.png" alt=".."/></a></li>
      </ul>
      <ul class="right">
        <li><a href="{{ url('auth/register') }}" class="btn btn-primary waves-effect waves-light">Sign up</a></li>
        <li><a href="{{ url('auth/login') }}" class="btn btn-secundary waves-effect waves-light">Login</a></li>
      </ul>
    </ul>

    <ul class="side-nav" id="mobile">
      <li><a href="#" class="waves-effect waves-light">About</a></li>
      <li><a href="#" class="waves-effect waves-light">Features</a></li>
      <li><a href="#" class="waves-effect waves-light">Learn</a></li>
    </ul>

  </div>
</nav>
<!-- NAVBAR -->
@stop
