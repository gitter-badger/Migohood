<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="..">
    <meta name="author" content="..">
    <title>Migohood &vert; Rent and stay with hosts around the World</title>
      <link href="/css/materialize.min.css" rel="stylesheet" media="screen,projection"/>        <!-- Materialize core CSS -->
      <link href="/css/materialicons.css" rel="stylesheet">                                     <!-- Material Icons -->
      <link href="/css/site.css" rel="stylesheet">                                              <!-- Style core CSS -->
      <script src="/js/jquery.min.js" type="text/javascript"></script>                          <!-- Jquery core JS -->
      <script src="/js/typed.js" type="text/javascript"></script>                               <!-- Typed core JS -->
      @include('common.favicon')
  </head>
<body>

  <section id="home">
    @include('common.navbar')
    <div id="welcome">

    <!-- Typing & Erasing -->
    <script type="text/javascript">
    $(function(){
      $(".text").typed({
        strings: ["Apartment", "House", "Room", "Cabain", "Home"],
        showCursor: false,
        typeSpeed: 60,
        backSpeed: 20
        });
    });
    </script>

    <h1 class="light">My <strong><span class="text"></span></strong> is available!</h1>
    <h5>Rent and stay with hosts around the World</h5>
    <a href="{{ url('/') }}" class="btn btn-primary waves-effect waves-light">How it works?</a><br>

    </div>

  </section>

</body>
</html>

<script src="/js/materialize.min.js" type="text/javascript"></script>           <!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>
