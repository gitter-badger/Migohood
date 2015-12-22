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
    <ul class="hide-on-med-and-down">
      <ul class="left">
        <li><a href="{{ url('/') }}"><img id="brand" src="/img/brand.png" alt=".."/></a></li>
      </ul>
      <ul class="right">
        <li><a href="" >Explorar</a></li>
        <li><a href="" >¿Cómo ser Anfitrión?</a></li>
        <li><a href="{{ url('') }}" class="btn btn-primary">Iniciar Sesión</a></li>
        <li><a href="{{ url('') }}" class="btn btn-secundary waves-effect waves-light">Registrarme</a></li>
      </ul>
    </ul>

    <ul class="side-nav" id="mobile">
      <li><a href="#" class="waves-effect waves-light">Explorar</a></li>
      <li><a href="#" class="waves-effect waves-light">¿Cómo ser Anfitrión?</a></li>
      <li><a href="#" class="waves-effect waves-light">Iniciar Sesión</a></li>
      <li><a href="#" class="waves-effect waves-light">Registrarme</a></li>
    </ul>

  </div>
</nav>
<!-- NAVBAR -->
<main>
</main>
</body>
@stop
