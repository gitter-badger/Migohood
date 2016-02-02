<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="..">
    <meta name="author" content="..">
    <title>Migohood | Help - @yield('title')</title>
      <link rel="shortcut icon" type="image/x-icon" href="/img/app/favicon.ico">
      <link href="/css/materialize.min.css" rel="stylesheet" media="screen,projection"/>        <!-- Materialize core CSS -->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">     <!--Import Google Icon Font-->
      <link href="/css/help.css" rel="stylesheet">                                              <!-- Style core CSS -->
      @yield('header')
  </head>
<body>
<main>
  <div class="center" id="intro">
    <a href="{{ url('/help') }}"><img src="/img/app/help-center.png" alt=".."/></a>
    <h4 class="">@yield('first')</h4>
    <p class="light second">@yield('second')</p>
    <div class="back">
      <img src="/img/site/back-foot02.png" alt=".." />
    </div>
  </div>
  @yield('content')
</main>
<!-- Foot -->
<section class="center" id="foot">
  <h4>What are you wating for?</h4>
  <p class="second">Thousand of people are on Migohood. Wait no more, Join Migohood today!</p>
  <a href="{{ url('/auth/register') }}" class="btn btn-reg waves-effect waves-light">Register Now </a><span>or</span>
  <a href="{{ url('help') }}" class="btn btn-read waves-effect waves-dark">Read more</a>
</section>
<!-- Foot -->
@include('common.footer')
</body>
</html>

<script src="/js/jquery.min.js" type="text/javascript"></script>                <!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script>           <!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>                      <!-- Init Custom JS File -->
<script src="/js/app.js" type="text/javascript"></script>                       <!-- App Custom JS File-->
@yield('footer')
