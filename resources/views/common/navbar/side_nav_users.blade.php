<!-- User Menu -->
  <!-- Explore -->
<p class="etiquette">Explore</p>
  <li><a href="{{ url('/app/create') }}"><i class="material-icons left">library_add</i> Host </a></li>
  <li><a href=""><i class="material-icons left">location_city</i> Spaces </a></li>
  <li><a href="#"><i class="material-icons left">work</i> Workspaces </a></li>
  <li><a href="#"><i class="material-icons left">directions_car</i> Parking Lots </a></li>
  <li><a href="#"><i class="material-icons left">local_play</i> Services </a></li>

  <!-- Inbox -->
<p class="etiquette">Inbox</p>
  <li><a href="{{ route('route', ['base'=> 'dashboard', 'route' => 'inbox']) }}"><i class="material-icons left">inbox</i> Inbox
      <span class="variable">{{ $messages=App\Message::where('to', Auth::user()->id)->count() }}</span>
        @if( $messages > 10 ) <span> +10 </span> @else <span> {{ $messages }} </span> @endif
  </a></li>

  <li><a href="#"><i class="material-icons left">send</i> Sent
      <span class="variable">{{ $messages=App\Message::where('from', Auth::user()->id)->count() }}</span>
        @if( $messages > 10 ) <span> +10 </span> @else <span> {{ $messages }} </span> @endif
  </a></li>

  <li><a href="#"><i class="material-icons left">drafts</i> Archived <span> 0 </span> </a></li>

  <!-- Dashboard -->
<p class="etiquette">Dashboard</p>
  <li><a href="{{ route('route', ['base'=> 'dashboard', 'route' => 'panel']) }}"><i class="material-icons left">developer_board</i> Panel </a></li>
  <li><a href="{{ route('route', ['base'=> 'dashboard', 'route' => 'reservations']) }}"><i class="material-icons left">event_note</i> Reservations <span> 0 </span></a></li>

  <li><a href="{{ route('route', ['base'=> 'dashboard', 'route' => 'myspaces']) }}"><i class="material-icons left">pin_drop</i> My spaces
      <span class="variable">{{ $spaces=App\Space::where('user_id', Auth::user()->id)->count() }}</span>
        @if( $spaces > 10 ) <span> +10 </span> @else <span> {{ $spaces }} </span> @endif
  </a></li>

  <li><a href="{{ route('route', ['base'=> 'dashboard', 'route' => 'myworkspaces']) }}"><i class="material-icons left">business_center</i> My Workspaces <span> 0 </span> </a></li>
  <li><a href="{{ route('route', ['base'=> 'dashboard', 'route' => 'myparkinglots']) }}"><i class="material-icons left">local_parking</i> My Parking Lots <span> 0 </span> </a></li>
  <li><a href="{{ route('route', ['base'=> 'dashboard', 'route' => 'myservices']) }}"><i class="material-icons left">receipt</i> My Services <span> 0 </span> </a></li>
  <li><a href="{{ route('route', ['base'=> 'dashboard', 'route' => 'transactions']) }}"><i class="material-icons left">view_list</i> Transactions </a></li>
  <li><a href="{{ route('route', ['base'=> 'dashboard', 'route' => 'history']) }}"><i class="material-icons left">history</i> History </a></li>

  <!-- Settings -->
<p class="etiquette">Settings</p>
  <li><a href="#"><i class="material-icons left">account_circle</i> Account </a></li>
  <li><a href="#"><i class="material-icons left">vpn_key</i> Privacy </a></li>
  <li><a href="#"><i class="material-icons left">payment</i> Payment </a></li>
  <li><a href="#"><i class="material-icons left">help</i> Help </a></li>
