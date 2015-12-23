@extends('layouts.site')
@section('title', 'MigoHood | Alquila y alójate con anfitriones alrededor del Mundo')
@section('header')
  <link href="/css/site.css" rel="stylesheet">                        <!-- Style core CSS -->
  <script src="/js/jquery.min.js" type="text/javascript"></script>    <!-- Jquery core JS -->
  <script src="/js/typed.js" type="text/javascript"></script>         <!-- Typed core JS -->
@stop
@section('content')
<section id="home">
  @include('common.navbar')
  <div id="welcome">

  <!-- Typing & Erasing -->
  <script type="text/javascript">
  $(function(){
    $(".text").typed({
      strings: ["Apartamento", "Casa", "Habitación", "Cabaña", "Hogar"],
      showCursor: false,
      typeSpeed: 60,
      backSpeed: 20
      });
  });
  </script>

  <h1 class="light">¡Mi <strong><span class="text"></span></strong> está disponible!</h1>
  <h5>Alquila y alójate con anfitriones alrededor del Mundo</h5>
  <a href="{{ url('/') }}" class="btn btn-primary waves-effect waves-light">¿Cómo funciona?</a><br>

  </div>

</section>
@stop
