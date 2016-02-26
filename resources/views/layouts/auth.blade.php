
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
      <link href="/css/auth.css" rel="stylesheet">                                              <!-- Style core CSS -->
      <link href="/css/media.css" rel="stylesheet">                                             <!-- Responsive and media core CSS -->
  </head>
<body>
<main>
  <div class="container center">
    <div class="panel">
      <a href="{{ url('/') }}"><img src="/img/app/brand.png" alt=".." /></a>
      <div class="container">
        @include('errors.errors')
        @yield('content')
      </div>
    </div>
  </div>
</main>
<!-- Footer Img -->
<div class="auth-img center">
  <img src="/img/site/back-foot02.png" alt=".." />
</div>

</body>
</html>
<script src="/js/jquery.min.js" type="text/javascript"></script>                <!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script>           <!-- Materialize core JS -->
