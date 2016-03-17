<!-- Nav bar Options (Desktop) -->
<ul class="right">

  @if(Auth::check())
     <!-- Authenticated users -->

     @if(Auth::user()->role == 'user')
        @include('common/navbar.large_nav_users')
     @endif

     @if(Auth::user()->role == 'admin')
        @include('common/navbar.large_nav_admins')
     @endif

  @else

    <!-- No Authenticated users -->
    <li><a href="{{ route('get.resource', ['resource' => 'spaces' ]) }}">Spaces</a></li>
    <li><a href="#">Workspaces</a></li>
    <li><a href="#">Parking Lots</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="#">Host</a></li>
    <li><a href="#">Help</a></li>
    <li><a href="{{ url('/auth/register') }}" class="btn waves-effect waves-light">Sign up</a></li>
    <li><a href="{{ url('/auth/login') }}">Login</a></li>

  @endif
 </ul>
 <!-- End of Nav bar Options (Desktop) -->
