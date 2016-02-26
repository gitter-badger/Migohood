<!-- Admin Menu -->
<li><a href="#">Dashboard</a></li>
<li><a href="#">Users</a></li>
<li><a href="#">Workers</a></li>
<li><a href="#">Payments</a></li>
<li><a href="#">Cases</a></li>
<li><a href="#">Users Verifications</a></li>
<!-- User - Dropdown -->
<li><a class="dropdown-options" href="#" data-activates="drop">
  {{ Auth::user()->name }}
  <img src ="{{ url(Auth::user()->avatar) }}" alt="..."/>
  <i class="right material-icons">arrow_drop_down</i></a>

  <ul class="dropdown-content" id="drop">
    <li><a href="#">Account</a></li>
    <li><a href="mailto:developer@migohood.com">Help</a></li>
    <li><a href="{{ url('/auth/logout') }}">Log out</a></li>
  </ul>
</li>
<!-- User - Dropdown -->
