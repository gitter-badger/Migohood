<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="..">
    <meta name="author" content="..">
    <title>@yield('title')</title>
      <link href="/css/materialize.min.css" rel="stylesheet" media="screen,projection"/>        <!-- Materialize core CSS -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    <!-- Material Icons -->
      @yield('header')
  </head>

<!-- Navbar -->
<header>
  <nav class="white" role="navigation">
    <div class="nav-wrapper">
      <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">dehaze</i></a>

      <ul class="logo">
        <li><a href="{{ url('/') }}"><img id="img" src="/img/brand.png" alt=".."/></a></li>
      </ul>

      <ul class="right">
        <li><a href="" >Explorar</a></li>
        <li><a href="" >¿Cómo ser Anfitrión?</a></li>
        <li><a href="{{ url('') }}" class="btn btn-primary">Iniciar Sesión</a></li>
        <li><a href="{{ url('') }}" class="btn btn-secundary waves-effect waves-light">Registrarme</a></li>
      </ul>

      <ul class="side-nav" id="mobile">
        <li><a href="#" class="waves-effect waves-light">Explorar</a></li>
        <li><a href="#" class="waves-effect waves-light">¿Cómo ser Anfitrión?</a></li>
        <li><a href="#" class="waves-effect waves-light">Iniciar Sesión</a></li>
        <li><a href="#" class="waves-effect waves-light">Registrarme</a></li>
      </ul>

    </div>
  </nav>
</header>
<!-- Navbar -->

<body>
<main>
@yield('content')
</main>
</body>
</html>

<script src="/js/jquery.min.js" type="text/javascript"></script>                <!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script>           <!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>                      <!-- Init Custom JS File -->
