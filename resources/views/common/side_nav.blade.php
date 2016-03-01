 <!-- Nav bar Options (Tablets & Mobile) -->
 <ul class="side-nav" id="mobile">

   @if(Auth::check())

     <!-- Authenticated users -->
     <div class="user-menu">
       <img src="{{ url(Auth::user()->avatar) }}" alt=".."/>
     </div>

     @if(Auth::user()->role == 'user')
        @include('common/navbar.side_nav_users')
     @endif

     @if(Auth::user()->role == 'admin')
        @include('common/navbar.side_nav_admins')
     @endif

     @if(Auth::user()->role == 'worker')
        @include('common/navbar.side_nav_workers')
     @endif

    <li><a href="{{ url('/auth/logout') }}"><i class="material-icons left">power_settings_new</i> Log out</a></li>

   @else

      <!-- No Authenticated users -->
      <div class="guest-menu center">
        <img src="/img/app/brand-white.png" alt=".."/>
      </div>

      <li><a href="{{ route('resource', ['resource' => 'spaces' ]) }}"><i class="material-icons left">location_city</i> Spaces </a></li>
      <li><a href="{{ route('resource', ['resource' => 'workspaces' ]) }}"><i class="material-icons left">work</i> Workspaces </a></li>
      <li><a href="{{ route('resource', ['resource' => 'parkinglots' ]) }}"><i class="material-icons left">directions_car</i> Parking Lots </a></li>
      <li><a href="{{ route('resource', ['resource' => 'services' ]) }}"><i class="material-icons left">local_play</i> Services </a></li>
      <li><a href="#"><i class="material-icons left">school</i> Host</a></li>
      <li><a href="#"><i class="material-icons left">help</i> Help</a></li>

      <div class="divider"></div>
      <li><a href="{{ url('/auth/register') }}"><i class="material-icons left">person_add</i>Sign up</a></li>
      <li><a href="{{ url('/auth/login') }}"><i class="material-icons left">person</i>Login</a></li>

   @endif

  </ul>
  <!-- End of Nav bar Options (Tablets & Mobile) -->
