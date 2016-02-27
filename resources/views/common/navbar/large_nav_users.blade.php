<!-- User Menu -->
<li><a href="{{ route('router', ['route' => 'spaces' ]) }}">Spaces</a></li>
<li><a href="{{ route('router', ['route' => 'workspaces' ]) }}">Workspaces</a></li>
<li><a href="{{ route('router', ['route' => 'parkinglots' ]) }}">Parking Lots</a></li>
<li><a href="{{ route('router', ['route' => 'services' ]) }}">Services</a></li>
<li><a href="#">Dashboard</a></li>
<li><a href="{{ url('/create') }}" class="btn waves-effect waves-light"><i class="material-icons">library_add</i>Host</a></li>

<!-- Notifications - Dropdown -->
<li><a class="dropdown-notifications" href="#" data-activates="notifications">

  <span class="variable">{{ $alerts = App\Notification::where('user_id', Auth::user()->id)->count() }}</span>

  <!-- If notifications is more than 10 -->
  @if( $alerts > 10 ) <span> +10 </span> @else <span> {{ $alerts }} </span> @endif

  <i class="left material-icons">notifications</i></a>
  <ul class="dropdown-content" id="notifications">
    <!-- If there aren't notifications -->
    @if( $alerts == 0 )<div class="nothing"><i class="material-icons">alarm_off</i><li class="alert">You have no alerts</li></div>@else

    <!-- If there are notifications -->
    <span class="variable">{{ $notifications=App\Notification::where('user_id', Auth::user()->id)->take(10)->get() }}</span>
      <!-- List of notifications -->
     @foreach( $notifications as $notification)
        <li class="{{ $notification->type }}"><a href="#"> {{ $notification->description }} </a></li>
     @endforeach
        <!-- If notifications is more than 10 -->
        @if( $alerts > 10 ) <li class="view-all"><a href="#">View More</a></li> @endif
   @endif
  </ul>
</li>
<!-- End of Notifications - Dropdown -->

<!-- Messages -->
<li><a class="dropdown-notifications">
  <span class="variable">{{ $messages=App\Message::where('to', Auth::user()->id)->count() }}</span>
  @if( $messages > 10 )  <span> +10 </span> @else <span> {{ $messages }} </span> @endif
  <i class="left material-icons">mail</i></a>
</li>
<!-- End of messages -->

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
