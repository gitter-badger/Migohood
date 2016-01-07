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

    <!-- Navbar -->
    <nav role="navigation">
      <div class="nav-wrapper">
        <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">dehaze</i></a>

        <ul class="logo">
          <li><a href="{{ url('/') }}"><img id="img" src="/img/brand-white.png" alt=".."/></a></li>
          <li><a href="{{ url('/') }}"><img id="img2" src="/img/brand.png" alt=".."/></a></li>
        </ul>

        <!-- Authenticated users -->
        @if(Auth::check())
          <ul class="right">
            <li><a href="{{ url('/explore') }}">Explore</a></li>
            <li><a href="#" >How to be a host?</a></li> <!-- Add link to how to be a host -->
            <li id="auth"><a href="{{ url('/posts/create') }}" class="btn btn-primary waves-effect waves-light"><i class="material-icons">library_add</i>New Announce</a></li>  <!-- Add link to create announce -->

              @include('common.nav-options')

          </ul>

          <ul class="side-nav" id="mobile"> <!-- Todo Sidenav -->
            <li><a href="{{ url('/explore') }}" class="waves-effect waves-light">Explore</a></li>
            <li><a href="{{ url('/auth/logout') }}" class="waves-effect waves-light">Logout</a></li>
          </ul>

        <!-- No Authenticated users -->
        @else
          <ul class="right">
            <li><a href="{{ url('/explore') }}" >Explore</a></li>
            <li><a href="#" >How to be a host?</a></li> <!-- Add link to how to be a host -->
            <li><a href="{{ url('/auth/register') }}" class="btn btn-primary waves-effect waves-light">Sign up</a></li>
            <li><a href="{{ url('/auth/login') }}">Login</a></li>
          </ul>

          <ul class="side-nav" id="mobile">
            <li><a href="{{ url('/explore') }}" class="waves-effect waves-light">Explore</a></li>
            <li><a href="#" class="waves-effect waves-light">How to be host?</a></li> <!-- Add link to how to be a host -->
            <li><a href="{{ url('/auth/register') }}" class="waves-effect waves-light">Sign up</a></li>
            <li><a href="{{ url('/auth/login') }}" class="waves-effect waves-light">Login</a></li>
          </ul>
        @endif

      </div>
    </nav>

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
<script src="/js/init.js" type="text/javascript"></script>                      <!-- Init core JS -->
