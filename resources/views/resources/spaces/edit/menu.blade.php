
  <a href="{{ route('resource.router', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'basics'
    ]) }}"><li @if($route == 'basics') class="active" @endif><i class="material-icons left">library_books</i>Basics</li></a>

  <a href="{{ route('resource.router', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'description'
    ]) }}"><li @if($route == 'description') class="active" @endif><i class="material-icons left">border_color</i>Description</li></a>

  <a href="{{ route('resource.router', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'location'
    ]) }}"><li @if($route == 'location') class="active" @endif><i class="material-icons left">location_on</i>Location</li></a>

  <a href="{{ route('resource.router', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'photos'
    ]) }}"><li @if($route == 'photos') class="active" @endif><i class="material-icons left">add_a_photo</i>Photos</li></a>

  <a href="{{ route('resource.router', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'pricing'
    ]) }}"><li @if($route == 'pricing') class="active" @endif><i class="material-icons left">receipt</i>Pricing</li></a>

  <a href="{{ route('resource.router', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'extras'
    ]) }}"><li @if($route == 'extras') class="active" @endif><i class="material-icons left">star</i>Extras</li></a>
