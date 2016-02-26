<!DOCTYPE html>
<html lang="en" id="site">
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
         <div class="center"><a href="{{ url('/') }}" class="brand"><img src="/img/app/brand.png" alt=".."/></a></div>
         <a href="{{ url('/') }}" class="brand"><img class="logo" src="/img/app/brand.png" alt=".."/></a>

         @include('common.large_nav')
         @include('common.side_nav')

       </div>
      </nav>
    </div>
  </header>
  <!-- Navbar -->

<body>
<main>
  @yield('content')
</main>

<!-- Foot -->
<section class="center page-foot">
  <h4>What are you wating for?</h4>
  <p>Join and Discover a community of locals host willing to serve and share the world</p>
  <a href="{{ url('/auth/register') }}" class="btn btn-reg waves-effect waves-light">Register Now </a><span>or</span>
  <a href="#" class="btn btn-read waves-effect waves-dark">Read more</a>

  <div class="back">
    <img src="/img/site/back-foot02.png" alt=".." />
  </div>
</section>
<!-- Foot -->

@include('common.footer')

</body>
</html>

<script src="/js/jquery.min.js" type="text/javascript"></script>                <!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script>           <!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>                      <!-- Init Custom JS File -->
<!--<script src="/js/app.js" type="text/javascript"></script>          -->             <!-- App Custom JS File-->
