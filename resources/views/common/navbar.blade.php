<!-- Navbar -->
<nav role="navigation">
  <div class="nav-wrapper">
    <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">dehaze</i></a>

    <ul class="logo">
      <li><a href="{{ url('/') }}"><img id="img" src="/img/brand-white.png" alt=".."/></a></li>
      <li><a href="{{ url('/') }}"><img id="img2" src="/img/brand.png" alt=".."/></a></li>
    </ul>

    <ul class="right">
      <li><a href="" >Explore</a></li>
      <li><a href="" >How to be a host?</a></li>
      <li><a href="{{ url('/auth/register') }}" class="btn btn-primary waves-effect waves-light">Sign up</a></li>
      <li><a href="{{ url('/auth/login') }}">Login</a></li>
    </ul>

    <ul class="side-nav" id="mobile">
      <li><a href="#" class="waves-effect waves-light">Explore</a></li>
      <li><a href="#" class="waves-effect waves-light">How to be host?</a></li>
      <li><a href="{{ url('/auth/register') }}" class="waves-effect waves-light">Sign up</a></li>
      <li><a href="{{ url('/auth/login') }}" class="waves-effect waves-light">Login</a></li>
    </ul>

  </div>
</nav>
