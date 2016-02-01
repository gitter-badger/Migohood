<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="..">
    <meta name="author" content="..">
    <title>Migohood &vert; @yield('title')</title>
      <link rel="shortcut icon" type="image/x-icon" href="/img/app/favicon.ico">
      <link href="/css/materialize.min.css" rel="stylesheet" media="screen,projection"/>        <!-- Materialize core CSS -->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">     <!--Import Google Icon Font-->
      <link href="/css/app.css" rel="stylesheet">                                               <!-- Style core CSS -->
  </head>
  <!-- Navbar -->
  <header id="main">
    <div class="navbar-fixed">
    <nav role="navigation">
      <div class="nav-wrapper">
        <!--<a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">dehaze</i></a>-->

        <ul class="left">
          <li><a href="{{ url('/') }}"><img src="/img/app/brand-white.png" alt=".."/></a></li>
        </ul>

        <ul class="right">
          @include('common.options')
        </ul>

        <!-- Todo  Side nav -->

      </div>
    </nav>
    </div>
  </header>
  <!-- Navbar -->
<body>
<main>

  <!-- Content -->
  <section class="body" id="new">
    <!-- Container -->
    <div class="container row">

      <!-- Menu Left -->
      <div class="col s2">
        <div class="menu">
            @yield('menu')
       </div>
      </div>
      <!-- Menu Left -->

      <!-- Box Center -->
      <div class="box col s7">
        <!-- Box-body -->
        <div class="box-body edit">
          @yield('content')
        </div>
        <!-- Box-body -->
      </div>
      <!-- Box Center -->

      <!-- Info Right -->
      <div class="col s3">
        <div class="info">
         <div class="info-body">
            @yield('info')
         </div>
       </div>
      </div>
      <!-- Info Right -->
    </div>
    <!-- Container -->
  </section>

</main>
  @include('common.footer')
</body>
</html>

<script src="/js/jquery.min.js" type="text/javascript"></script>                <!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script>           <!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>                      <!-- Init Custom JS File -->
<script src="/js/app.js" type="text/javascript"></script>                       <!-- App Custom JS File-->
@yield('footer')
