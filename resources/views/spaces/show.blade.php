@if( $space->public == 'no')
  -- Preview --
  <ul>
    <li>Type - {{ $space->type }} </li>
    <li>accomodance - {{ $space->accomodance }} </li>
    <li>capacity - {{ $space->capacity }} </li>
    <li>Bedrooms - {{ $space->bedrooms }} </li>
    <li>Bathrooms - {{ $space->bathrooms }} </li>
    <li>Beds - {{ $space->beds }} </li>
    <li>Title - {{ $space->title }} </li>
    <li>Description - {{ $space->description }} </li>
  </ul>

  <a href="{{ url($space->notpublic) }}">Continue editing</a>

    @foreach ($photos as $photo)
      <img src="{{ $photo->path }}" alt="" width="200px"/>
    @endforeach


@else
  -- Show --
  <ul>
    <li>Type - {{ $space->type }} </li>
    <li>Type - {{ $space->accomodance }} </li>
    <li>capacity - {{ $space->capacity }} </li>
  </ul>

  @if(Auth::user()->id  == $space->user_id)
    <a href=" {{ route('space.basics', ['hash' => $space->hash ]) }}">Edit</a>
  @else
    <a href=" #">reserve</a>
 @endif

@endif
