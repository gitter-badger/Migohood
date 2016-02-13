@extends('layouts.app')
@section('title')
  {{ $space->type }} - {{ $space->accomodance }}
    in {{ $space->city }}, {{ $space->country }}
@stop
@section('header')
  <link href="/css/ninja-slider.css" rel="stylesheet" type="text/css" />
  <script src="/js/ninja-slider.js" type="text/javascript"></script>
@stop
@section('content')


@if(Auth::user()->id  != $space->user_id)
<!-- Reserve NavBar -->
<div id="search">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper reservable">

    <form class="container row" action="/book"  role="search" id="search_box">
      {{ csrf_field() }}

      <div class="col s1">
        <i class="material-icons">flight_land</i>
      </div>

      <div class="col s2">
        <input placeholder="Check In" type="date" name="check_in" class="datepicker">
      </div>

      <div class="col s1">
        <i class="material-icons">flight_takeoff</i>
      </div>

      <div class="col s2">
        <input  placeholder="Check Out" type="date" name="check_out" class="datepicker">
      </div>

      <div class="col s1">
        <i class="material-icons">group_add</i>
      </div>

      <!-- Capacity  -->
      <div class="input-field col s2 last">
        <select name="capacity">
          <option value="" disabled selected>Capacity</option>
          @if( $space->capacity == '16+')
            <option value="1"> 1 Guest</option>
            <option value="2"> 2 Guests</option>
            <option value="3"> 3 Guests</option>
            <option value="4"> 4 Guests</option>
            <option value="5"> 5 Guests</option>
            <option value="6"> 6 Guests</option>
            <option value="7"> 7 Guests</option>
            <option value="8"> 8 Guests</option>
            <option value="9"> 6 Guests</option>
            <option value="10"> 10 Guests</option>
            <option value="11"> 11 Guests</option>
            <option value="12"> 12 Guests</option>
            <option value="13"> 13 Guests</option>
            <option value="14"> 14 Guests</option>
            <option value="15"> 15 Guests</option>
            <option value="16"> 16 Guests</option>
            <option value="16+"> 16+ Guests </option>
          @else
            @for($i = 1; $i <=$space->capacity; $i++)
              <option value={{$i}} > {{ $i }} Guest</option>
            @endfor
          @endif  
        </select>
      </div>
      <!-- Capacity -->

      <div class="col s2">
        <button class="btn" type="submit">Book Now!</button>
      </div>

    </form>

  </div>
</nav>
</div>
</div>
<!-- Reserve NavBar -->
@endif

<section class="row show">

  <!-- Top -->
  <div class="col s12">
    <!-- Pictures -->
    <div class="col s4">
       <div id="ninja-slider">
           <div class="slider-inner">
               <ul>
                  <li><a class="ns-img" href='{{ $space->thumbnail }}'></a></li>
                 @foreach ($photos as $photo)
                  <li><a class="ns-img" href='{{ $photo->path }}'></a></li>
                 @endforeach
               </ul>
               <div class="fs-icon" title="Expand/Close"></div>
           </div>
       </div>
     </div>
     <!-- Pictures -->

     <!-- Info -->
     <div class="col s4">
       <p><span class="stars">
           @if($space->stars == 0)
             @for ($i = $space->stars; $i < 5; $i++)
               <i class="material-icons not_filled">star</i>
             @endfor
           @endif

           @for ($i = 1; $i <=$space->stars; $i++)
           <i class="material-icons filled">star</i>
             @if(($i == $space->stars) and ($space->stars != 5))
               @for ($i = $space->stars; $i < 5; $i++)
                 <i class="material-icons not_filled">star</i>
               @endfor
             @endif
           @endfor
       </span></p>
       <h4 class="title"> {{ $space->title }}</h4>
       <h6 class="subtitle"> {{ $space->description }}</h6>
       <p><span class="location"><i class="material-icons">location_on</i>{{ $space->city }}, {{ $space->country }}</span></p>
       <h6 class="published"> Published {{ $space->created_at->diffForHumans() }}</h6>
       <p><span class="category space">{{ $space->type }} -  {{ $space->accomodance }}</span></p>

       </div>
     <!-- Info -->

     <!-- Price -->
     <div class="col s4 show-price">
       <div class="show-price-body">
         <h6 class="currency">{{ $space->currency }}</h6>
         <h5 class="price truncate"><span>$</span>{{ $space->price }}</h5>
         <p class="per">Per {{ $space->per }}</p>
       </div>
       <div class="row show-price-bottom">
         <div class="col s4">
             <i class="material-icons stars">star</i><span>{{ $space->stars }}</span>
         </div>
         <div class="col s4">
            <i class="material-icons recommends">favorite</i><span>{{ $space->recommends }} <span class="of">/ 2</span></span>
         </div>
         <div class="col s4">
           <i class="material-icons comments">forum</i><span>{{ $space->comments }}</span>
         </div>
       </div>

     </div>
     <!-- Price -->

  </div>
  <!-- Top -->

  <!-- Bottom -->
  <div class="col s12 show-bottom">

    <!-- Host Description -->
    <div class="col s4 row host">

        <div class="col s4">
          <a href="#"><img src="{{ $space->user->avatar }}" alt="" /></a>
        </div>

        <div class="col s8">
          <h6 class="title"> {{ $space->user->name }}</h6>
          <h6 class="joined"> Joined {{ $space->user->created_at->diffForHumans() }}</h6>

          <div class="host-bottom row">

            <div class="col s4">
              <i class="material-icons stars">star</i><span>{{ $space->user->stars }}</span>
            </div>

            <div class="col s4">
              <i class="material-icons recommends">favorite</i><span>{{ $space->user->recommends }}</span>
            </div>

            <div class="col s4">
              <i class="material-icons comments">forum</i><span>{{ $space->user->comments }}</span>
            </div>


          </div>

        </div>

    </div>
    <!-- Host Description -->

    <div class="col s8">
      <div class="show-bottom-title">
        <i class="material-icons">event_note</i>Facilities
      </div>

      <div class="row">
        <div class="col s3">
          <i class="material-icons">group_add</i><span>
              @if( $space->capacity == 1)
                {{ $space->capacity }} Person
              @endif
          </span>


        </div>

        <div class="col s3">
          a

        </div>


      </div>
    </div>

    <!-- Comments -->
    <div class="col s12">
      <div class="show-bottom-title">
        <i class="material-icons">forum</i>Comments
      </div>
        <!-- Here -->
    </div>
    <!-- Comments -->

  </div>
  <!-- Bottom -->



    @if(Auth::user()->id  == $space->user_id)
      <a href=" {{ route('space.router', ['hash' => $space->hash, 'route' => 'basics' ]) }}">Edit</a>

    @else
      <a href=" #">reserve</a>
   @endif

</section>
@stop
