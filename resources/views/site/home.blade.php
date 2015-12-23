<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="..">
    <meta name="author" content="..">
    <title>MigoHood | Alquila y alójate con anfitriones alrededor del Mundo</title>
      <link href="/css/materialize.min.css" rel="stylesheet" media="screen,projection"/>        <!-- Materialize core CSS -->
      <link href="/css/materialicons.css" rel="stylesheet">                                     <!-- Material Icons -->
      <link href="/css/site.css" rel="stylesheet">                                              <!-- Style core CSS -->
      <script src="/js/jquery.min.js" type="text/javascript"></script>                          <!-- Jquery core JS -->
      <script src="/js/typed.js" type="text/javascript"></script>                               <!-- Typed core JS -->
      @include('common.favicon')
  </head>
<body>
<main>
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
</main>
</body>
</html>

<script src="/js/materialize.min.js" type="text/javascript"></script>           <!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>
