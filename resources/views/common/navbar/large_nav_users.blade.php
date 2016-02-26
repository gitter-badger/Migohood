<!-- User Menu -->
<li><a href="{{ url('/spaces') }}">Spaces</a></li>
<li><a href="#">Workspaces</a></li>
<li><a href="#">Parking Lots</a></li>
<li><a href="#">Services</a></li>
<li><a href="#">Dashboard</a></li>
<li><a href="{{ url('/create') }}" class="btn waves-effect waves-light"><i class="material-icons">library_add</i>Host</a></li>

<!-- Notifications - Dropdown -->
<li><a class="dropdown-notifications" href="#" data-activates="drop-not">
  @if( Auth::user()->alerts > 10 )
    <span> +10 </span>
  @else
    <span> {{ Auth::user()->alerts }} </span>
  @endif

  <i class="left material-icons">notifications</i></a>
  <ul class="dropdown-content" id="drop-not">
    <li><a href="#">Settings</a></li>
    <li><a href="#">Help</a></li>
  </ul>
</li>
<!-- Notifications - Dropdown -->

<!-- Notifications - Dropdown -->
<li><a class="dropdown-notifications" href="#">
  @if( Auth::user()->messages >= 10 )
    <span> +10 </span>
  @else
    <span> {{Auth::user()->messages }} </span>
  @endif

  <i class="left material-icons">mail</i></a>
</li>
<!-- Notifications - Dropdown -->

<!-- User - Dropdown -->
<li><a class="dropdown-options" href="#" data-activates="drop">
  <img src ="{{ url(Auth::user()->avatar) }}" alt="..."/>
  <i class="right material-icons">arrow_drop_down</i></a>

  <ul class="dropdown-content" id="drop">
    <li><a href="#">Settings</a></li>
    <li><a href="#">Help</a></li>
    <li><a href="{{ url('/auth/logout') }}">Log out</a></li>
  </ul>
</li>
<!-- User - Dropdown -->
