<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="..">
    <meta name="author" content="..">
    <title>Migohood &vert; @yield('title')</title>
      <link href="/css/materialize.min.css" rel="stylesheet" media="screen,projection"/>        <!-- Materialize core CSS -->
      <link href="/css/materialicons.css" rel="stylesheet">                                     <!-- Material Icons -->
      <link href="/css/site.css" rel="stylesheet">                                              <!-- Style core CSS -->
      @yield('header')
      @include('common.favicon')
  </head>
  <header>
    <!-- here goes navbar-->
  </header>
<body>
<main>
  @yield('content')
</main>
</body>
</html>

@yield('footer')
<script src="/js/jquery.min.js" type="text/javascript"></script>                <!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script>           <!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>                      <!-- Init Custom JS File -->
