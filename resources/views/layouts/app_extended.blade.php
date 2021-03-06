<!DOCTYPE html>
<html lang="en" id="app">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="..">
    <meta name="author" content="..">
    <title>Migohood &vert; @yield('title')</title>
      <link rel="shortcut icon" type="image/x-icon" href="/img/app/favicon.ico">                <!-- Favicon -->
      <link href="/css/materialize.min.css" rel="stylesheet" media="screen,projection"/>        <!-- Materialize core CSS -->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">     <!-- Import Google Icon Font-->
      <link href="/css/app.css" rel="stylesheet">                                               <!-- App Style core CSS -->
      <link href="/css/site.css" rel="stylesheet">                                              <!-- Site Style core CSS -->
      <link href="/css/media.css" rel="stylesheet">                                             <!-- Responsive and media core CSS -->
      @yield('header')
  </head>
  <!-- Navbar -->
  <header id="main">
    <div class="navbar-fixed">
      <nav role="navigation">
       <div class="nav-wrapper">

         <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
         <div class="center"><a href="{{ url('/') }}" class="brand"><img src="/img/app/brand-white.png" alt=".."/></a></div>
         <a href="{{ url('/') }}" class="brand"><img class="logo" src="/img/app/brand-white.png" alt=".."/></a>

          @include('common.large_nav')
          @include('common.side_nav')

       </div>
      </nav>
    </div>
  </header>
  <!-- Navbar -->

<body>
<main id="app_extended">

  <!-- Body -->
  <div class="body container row">

    <!-- Menu Left -->
    <div class="col m3 l3">
      <div class="menu">
        <ul>@yield('menu')</ul>
     </div>
    </div>
    <!-- End of Menu Left -->

    <!-- Content -->
    <div class="col s12 m9 l9">
        @yield('content')
    <!-- End of Content -->

  </div>
  <!-- End of Body -->

</main>

@include('common.footer')

</body>
</html>

<script src="/js/jquery.min.js" type="text/javascript"></script>                <!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script>           <!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>                      <!-- Init Custom JS File -->
<script src="/js/app.js" type="text/javascript"></script>                       <!-- App Custom JS File-->
