<!-- Authenticated users -->
@if(Auth::check())
  <li><a href="{{ url('/spaces') }}">Spaces</a></li>
  <li><a href="{{ url('/offices') }}">Offices</a></li>
  <li><a href="{{ url('/services') }}">Services</a></li>
  <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
  <li><a href="#choose" class="btn btn-start waves-effect waves-dark modal-trigger"><i class="material-icons">library_add</i>New Announce</a></li>

  <!-- Nav Options -->
  <li><a class="dropdown-options" href="#" data-activates="drop">
    <span>{{ Auth::user()->name }}</span>
    <img src ="{{ url(Auth::user()->avatar) }}" alt="..."/>
    <i id="ico" class="right material-icons">arrow_drop_down</i></a>

    <ul class="dropdown-content" id="drop">
      <!--<li><a href="#!">Profile</a></li>-->
      <li><a href="{{ url('/settings/account') }}">Settings</a></li>
      <li><a href="{{ url('/help') }}">Help</a></li>      
      <li><a href="{{ url('/auth/logout') }}">Log out</a></li>
    </ul>
  </li>

<!-- No Authenticated users -->
@else
  <li><a href="{{ url('/spaces') }}">Spaces</a></li>
    <li><a href="{{ url('/offices') }}">Offices</a></li>
  <li><a href="{{ url('/services') }}">Services</a></li>
  <li><a href="{{ url('/help') }}">Help</a></li>
  <li><a href="#">How to start?</a></li>
  <li><a href="{{ url('/auth/register') }}" class="btn btn-reg waves-effect waves-light">Sign up</a></li>
  <li><a href="{{ url('/auth/login') }}">Login</a></li>
@endif
