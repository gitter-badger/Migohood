
  <a href="{{ route('route', [
    'base'=> 'dashboard',
    'route' => 'panel'
    ]) }}"><li @if($route == 'panel') class="active" @endif><i class="material-icons left">developer_board</i>Panel</li></a>

  <a href="{{ route('route', [
    'base'=> 'dashboard',
    'route' => 'reservations'
    ]) }}"><li @if($route == 'reservations') class="active" @endif><i class="material-icons left">event_note</i>Reservations <span> 0 </span></li></a>

  <a href="{{ route('route', [
    'base'=> 'dashboard',
    'route' => 'inbox'
    ]) }}"><li @if($route == 'inbox') class="active" @endif><i class="material-icons left">inbox</i>Inbox
              <span class="variable">{{ $messages=App\Message::where('to', Auth::user()->id)->count() }}</span>
                @if( $messages > 10 ) <span> +10 </span> @else <span> {{ $messages }} </span> @endif
            </li>
  </a>

  <a href="{{ route('route', [
    'base'=> 'dashboard',
    'route' => 'myspaces'
    ]) }}"><li @if($route == 'myspaces') class="active" @endif><i class="material-icons left">pin_drop</i>My Spaces
              <span class="variable">{{ $spaces=App\Space::where('user_id', Auth::user()->id)->count() }}</span>
                @if( $spaces > 10 ) <span> +10 </span> @else <span> {{ $spaces }} </span> @endif
          </li>
  </a>

  <a href="{{ route('route', [
    'base'=> 'dashboard',
    'route' => 'myworkspaces'
    ]) }}"><li @if($route == 'myworkspaces') class="active" @endif><i class="material-icons left">business_center</i>My Workspaces <span> 0 </span> </li></a>

  <a href="{{ route('route', [
    'base'=> 'dashboard',
    'route' => 'myparkinglots'
    ]) }}"><li @if($route == 'myparkinglots') class="active" @endif><i class="material-icons left">local_parking</i>My Parkings <span> 0 </span> </li></a>

  <a href="{{ route('route', [
    'base'=> 'dashboard',
    'route' => 'myservices'
    ]) }}"><li @if($route == 'myservices') class="active" @endif><i class="material-icons left">receipt</i>My Services <span> 0 </span> </li></a>

  <a href="{{ route('route', [
    'base'=> 'dashboard',
    'route' => 'transactions'
    ]) }}"><li @if($route == 'transactions') class="active" @endif><i class="material-icons left">view_list</i>Transactions</li></a>

  <a href="{{ route('route', [
    'base'=> 'dashboard',
    'route' => 'history'
    ]) }}"><li @if($route == 'history') class="active" @endif><i class="material-icons left">history</i>History</li></a>

  <a href="{{ route('route', [
    'base'=> 'dashboard',
    'route' => 'settings'
    ]) }}"><li @if($route == 'settings') class="active" @endif><i class="material-icons left">settings</i>Settings</li></a>
