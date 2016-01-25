<!-- Nav Options -->
<li><a class="dropdown-options" href="#" data-activates="drop">
  <span>{{ Auth::user()->name }}</span>
  <img src =" {{ url(Auth::user()->avatar) }} " alt="..."/>
  <i id="ico" class="right material-icons">arrow_drop_down</i></a>

  <ul class="dropdown-content" id="drop">
    <li><a href="#!">Profile</a></li>
    <li><a href="{{ url('settings/profile') }}">Settings</a></li>
    <li><a href="#!">Help</a></li>
    <li><a href="{{ url('auth/logout') }}">Log out</a></li>
  </ul>
</li>
