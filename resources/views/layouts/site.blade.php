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
      <link href="/css/site.css" rel="stylesheet">                                              <!-- Style core CSS -->
      @yield('header')
  </head>
  <!-- Navbar -->
  <header id="main">
    <div class="navbar-fixed">
    <nav role="navigation">
      <div class="nav-wrapper">
        <!--<a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">dehaze</i></a>-->

        <ul class="left">
          <li><a href="{{ url('/') }}"><img src="/img/app/brand.png" alt=".."/></a></li>
        </ul>

        <ul class="right">
          <!-- Authenticated users -->
          @if(Auth::check())
            <li><a href="{{ url('/explore') }}">Explore</a></li>
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/create') }}" class="btn btn-start waves-effect waves-light"><i class="material-icons">library_add</i>New Announce</a></li>

            @include('common.nav-options')

          <!-- No Authenticated users -->
          @else
            <li><a href="{{ url('/explore') }}">Explore</a></li>
            <li><a href="#">How to be a host?</a></li>
            <li><a href="{{ url('/auth/register') }}" class="btn btn-reg waves-effect waves-light">Sign up</a></li>
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

<!--<div class="divider" id="container"></div>-->

<!-- Foot -->
<section class="center" id="foot">
  <h4>What are you wating for?</h4>
  <p class="second">Thousand of people are on Migohood. Wait no more, Join Migohood today!</p>
  <a href="{{ url('/auth/register') }}" class="btn btn-reg waves-effect waves-light">Register Now </a><span>or</span>
  <a href="#" class="btn btn-read waves-effect waves-dark">Read more</a>
  <!-- Footer Img -->
  <div class="back">
    <img src="/img/site/back-foot02.png" alt=".." />
  </div>
</section>
<!-- Foot -->

<!-- Footer -->
<footer class="page-footer">

  <div class="foot container row">

    <div class="col s4 img">
        <a href="{{ url('/') }}"><img src="/img/app/brand-white.png" alt=".."/></a>
    </div>

    <div class="col s2">
      <h5>Find Out</h5>
      <ul>
        <li><a href="#!">Explore</a></li>
        <li><a href="#!">How it Works?</a></li>
        <li><a href="#!">How to be a Host?</a></li>
      </ul>
    </div>

      <div class="col s2">
      <h5>About</h5>
      <ul>
        <li><a href="#!">Company</a></li>
        <li><a href="#!">Contact us</a></li>
        <li><a href="#!">Press</a></li>
      </ul>
     </div>

    <div class="col s2">
      <h5>Legal</h5>
      <ul>
        <li><a href="#!">Term of Use</a></li>
        <li><a href="#!">Privacy Policy</a></li>
        <li><a href="#!">Support</a></li>
      </ul>
     </div>

     <div class="col s2">
       <h5>Connect</h5>
       <ul>
         <li><a href="#!">Facebook</a></li>
         <li><a href="#!">Google</a></li>
         <li><a href="#!">Twitter</a></li>
         <li><a href="#!">Github</a></li>
       </ul>
      </div>

  </div>

  <div class="footer-copyright">
    <div class="center">
      © 2016 All rights reserved. Crafted with <span>&#10084;</span> by The Migohood's Team
    </div>
  </div>
</footer>
<!-- Footer -->

</body>
</html>

<script src="/js/jquery.min.js" type="text/javascript"></script>                <!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script>           <!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>                      <!-- Init Custom JS File -->
<script src="/js/app.js" type="text/javascript"></script>                       <!-- App Custom JS File-->
@yield('footer')
