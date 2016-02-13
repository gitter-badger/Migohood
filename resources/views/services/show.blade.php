@extends('layouts.app')
@section('title')
  {{ $service->type }} -
  @if( $service->capacity == '1')
    {{ $service->capacity }} Person
  @else
   {{ $service->capacity }} People
  @endif
  
    in {{ $service->city }}, {{ $service->country }}
@stop
@section('header')
  <link href="/css/ninja-slider.css" rel="stylesheet" type="text/css" />
  <script src="/js/ninja-slider.js" type="text/javascript"></script>
@stop
@section('content')


@if(Auth::user()->id  != $service->user_id)
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
          @if($service->capacity == '1')
            <option value="1"> 1 People</option>
          @else
            @for($i = 1; $i <=$service->capacity; $i++)
              @if($i == '1')
                <option value="1"> 1 Person</option>
              @else
                <option value={{$i}} > {{ $i }} People</option>
              @endif
            @endfor
          @endif

          @if( $service->capacity == '16+')
            <option value="1"> 1 Person</option>
            <option value="2"> 2 People</option>
            <option value="3"> 3 People</option>
            <option value="4"> 4 People</option>
            <option value="5"> 5 People</option>
            <option value="6"> 6 People</option>
            <option value="7"> 7 People</option>
            <option value="8"> 8 People</option>
            <option value="9"> 6 People</option>
            <option value="10"> 10 People</option>
            <option value="11"> 11 People</option>
            <option value="12"> 12 People</option>
            <option value="13"> 13 People</option>
            <option value="14"> 14 People</option>
            <option value="15"> 15 People</option>
            <option value="16"> 16 People</option>
            <option value="17"> 17 People</option>
            <option value="18"> 18 People</option>
            <option value="19"> 19 People</option>
            <option value="20"> 20 People</option>
            <option value="20+"> 20+ People</option>
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
                  <li><a class="ns-img" href='{{ $service->thumbnail }}'></a></li>
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
           @if($service->stars == 0)
             @for ($i = $service->stars; $i < 5; $i++)
               <i class="material-icons not_filled">star</i>
             @endfor
           @endif

           @for ($i = 1; $i <=$service->stars; $i++)
           <i class="material-icons filled">star</i>
             @if(($i == $service->stars) and ($service->stars != 5))
               @for ($i = $service->stars; $i < 5; $i++)
                 <i class="material-icons not_filled">star</i>
               @endfor
             @endif
           @endfor
       </span></p>
       <h4 class="title"> {{ $service->title }}</h4>
       <h6 class="subtitle"> {{ $service->description }}</h6>
       <p><span class="location"><i class="material-icons">location_on</i>{{ $service->city }}, {{ $service->country }}</span></p>
       <h6 class="published"> Published {{ $service->created_at->diffForHumans() }}</h6>
       <p><span class="category service">{{ $service->type }} -
         @if($service->capacity == '1')
            1 Person
         @else
           {{ $service->capacity }} People
         @endif
         </span></p>

       </div>
     <!-- Info -->

     <!-- Price -->
     <div class="col s4 show-price">
       <div class="show-price-body">
         <h6 class="currency">{{ $service->currency }}</h6>
         <h5 class="price truncate"><span>$</span>{{ $service->price }}</h5>
         <p class="per">Per {{ $service->per }}</p>
       </div>
       <div class="row show-price-bottom">
         <div class="col s4">
             <i class="material-icons stars">star</i><span>{{ $service->stars }}</span>
         </div>
         <div class="col s4">
            <i class="material-icons recommends">favorite</i><span>{{ $service->recommends }}<span class="of">/ {{ $service->votes }}</span></span>
         </div>
         <div class="col s4">
           <i class="material-icons comments">forum</i><span>{{ $service->comments }}</span>
         </div>
       </div>

     </div>
     <!-- Price -->

  </div>
  <!-- Top -->

  <!-- Bottom -->
  <div class="col s12 show-bottom">

    <!-- Host Description -->
    <div class="col s5 row host">

        <div class="col s4">
          <a href="#"><img src="{{ $service->user->avatar }}" alt="" /></a>
        </div>

        <div class="col s8">
          <h6 class="title"> {{ $service->user->name }}</h6>
          <h6 class="joined"> Joined {{ $service->user->created_at->diffForHumans() }}</h6>

          <div class="host-bottom row">

            <div class="col s4">
              <i class="material-icons stars">star</i><span>{{ $service->user->stars }}</span>
            </div>

            <div class="col s4">
              <i class="material-icons recommends">favorite</i><span>{{ $service->user->recommends }}</span>
            </div>

            <div class="col s4">
              <i class="material-icons comments">forum</i><span>{{ $service->user->comments }}</span>
            </div>

          </div>

        </div>

    </div>
    <!-- Host Description -->




  </div>
  <!-- Bottom -->

</section>
@stop
