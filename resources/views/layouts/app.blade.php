<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="..">
    <meta name="author" content="..">
    <title>Migohood &vert; @yield('title')</title>
      <link href="/css/materialize.min.css" rel="stylesheet" media="screen,projection"/>        <!-- Materialize core CSS -->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">     <!--Import Google Icon Font-->
      <link href="/css/app.css" rel="stylesheet">                                               <!-- Style core CSS -->
      @include('common.favicon')
      @yield('header')
  </head>
  <!-- Navbar -->
  <header id="main">
    <div class="navbar-fixed">
    <nav role="navigation">
      <div class="nav-wrapper">
        <!--<a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">dehaze</i></a>-->

        <ul class="left">
          <li><a href="{{ url('/') }}"><img src="/img/brand-white.png" alt=".."/></a></li>
        </ul>

        <ul class="right">
          <!-- Authenticated users -->
          @if(Auth::check())
            <li><a href="{{ url('/explore') }}">Explore</a></li>
            <li><a href="{{ url('/posts/create') }}" class="btn btn-start waves-effect waves-dark"><i class="material-icons">library_add</i>New Announce</a></li>

            @include('common.nav-options')

          <!-- No Authenticated users -->
          @else
            <li><a href="#">How to be a host?</a></li>
            <li><a href="{{ url('/auth/register') }}" class="btn btn-reg waves-effect waves-dark">Sign up</a></li>
            <li><a href="{{ url('/auth/login') }}">Login</a></li>
          @endif

        </ul>

        <!-- Todo  Side nav -->

      </div>
    </nav>
    </div>
  </header>

<body>
<main>
  @yield('content')
</main>
</body>
</html>

<script src="/js/jquery.min.js" type="text/javascript"></script>                <!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script>           <!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>                      <!-- Init Custom JS File -->
<script src="/js/app.js" type="text/javascript"></script>                       <!-- App Custom JS File-->
@yield('footer')
