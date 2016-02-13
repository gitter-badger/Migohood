@extends('layouts.app')
@section('title')
  {{ $office->type }} - {{ $office->accomodance }}
    in {{ $office->city }}, {{ $office->country }}
@stop
@section('header')
  <link href="/css/ninja-slider.css" rel="stylesheet" type="text/css" />
  <script src="/js/ninja-slider.js" type="text/javascript"></script>
@stop
@section('content')


@if(Auth::user()->id  != $office->user_id)
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
          @if($office->capacity == '1')
            <option value="1"> 1 Employee</option>
          @else
            @for($i = 1; $i <=$office->capacity; $i++)
              @if($i == '1')
                <option value="1"> 1 Employee</option>
              @else
                <option value={{$i}} > {{ $i }} Employees</option>
              @endif
            @endfor
          @endif

          @if( $office->capacity == '16+')
            <option value="1"> 1 Employee</option>
            <option value="2"> 2 Employees</option>
            <option value="3"> 3 Employees</option>
            <option value="4"> 4 Employees</option>
            <option value="5"> 5 Employees</option>
            <option value="6"> 6 Employees</option>
            <option value="7"> 7 Employees</option>
            <option value="8"> 8 Employees</option>
            <option value="9"> 6 Employees</option>
            <option value="10"> 10 Employees</option>
            <option value="11"> 11 Employees</option>
            <option value="12"> 12 Employees</option>
            <option value="13"> 13 Employees</option>
            <option value="14"> 14 Employees</option>
            <option value="15"> 15 Employees</option>
            <option value="16"> 16 Employees</option>
            <option value="17"> 17 Employees</option>
            <option value="18"> 18 Employees</option>
            <option value="19"> 19 Employees</option>
            <option value="20"> 20 Employees</option>
            <option value="20+"> 20+ Employees</option>
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
                  <li><a class="ns-img" href='{{ $office->thumbnail }}'></a></li>
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
           @if($office->stars == 0)
             @for ($i = $office->stars; $i < 5; $i++)
               <i class="material-icons not_filled">star</i>
             @endfor
           @endif

           @for ($i = 1; $i <=$office->stars; $i++)
           <i class="material-icons filled">star</i>
             @if(($i == $office->stars) and ($office->stars != 5))
               @for ($i = $office->stars; $i < 5; $i++)
                 <i class="material-icons not_filled">star</i>
               @endfor
             @endif
           @endfor
       </span></p>
       <h4 class="title"> {{ $office->title }}</h4>
       <h6 class="subtitle"> {{ $office->description }}</h6>
       <p><span class="location"><i class="material-icons">location_on</i>{{ $office->city }}, {{ $office->country }}</span></p>
       <h6 class="published"> Published {{ $office->created_at->diffForHumans() }}</h6>
       <p><span class="category office">{{ $office->type }} -  {{ $office->accomodance }}</span></p>

       </div>
     <!-- Info -->

     <!-- Price -->
     <div class="col s4 show-price">
       <div class="show-price-body">
         <h6 class="currency">{{ $office->currency }}</h6>
         <h5 class="price truncate"><span>$</span>{{ $office->price }}</h5>
         <p class="per">Per {{ $office->per }}</p>
       </div>
       <div class="row show-price-bottom">
         <div class="col s4">
             <i class="material-icons stars">star</i><span>{{ $office->stars }}</span>
         </div>
         <div class="col s4">
            <i class="material-icons recommends">favorite</i><span>{{ $office->recommends }}<span class="of">/ {{ $office->votes }}</span></span>
         </div>
         <div class="col s4">
           <i class="material-icons comments">forum</i><span>{{ $office->comments }}</span>
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
          <a href="#"><img src="{{ $office->user->avatar }}" alt="" /></a>
        </div>

        <div class="col s8">
          <h6 class="title"> {{ $office->user->name }}</h6>
          <h6 class="joined"> Joined {{ $office->user->created_at->diffForHumans() }}</h6>

          <div class="host-bottom row">

            <div class="col s4">
              <i class="material-icons stars">star</i><span>{{ $office->user->stars }}</span>
            </div>

            <div class="col s4">
              <i class="material-icons recommends">favorite</i><span>{{ $office->user->recommends }}</span>
            </div>

            <div class="col s4">
              <i class="material-icons comments">forum</i><span>{{ $office->user->comments }}</span>
            </div>

          </div>

        </div>

    </div>
    <!-- Host Description -->

    <!-- Facilities -->
    <div class="col s7 facilities">

      <div class="show-bottom-title">
        <i class="material-icons">event_note</i>Facilities
      </div>

      <!-- row -->
      <div class="row">
        <!-- Capacity -->
        <div class="col s3">
          <i class="material-icons">group</i>
          <p><span class="title"> Capacity </span></p>
          <p><span class="subtitle">
              @if( $office->capacity == 1)
                {{ $office->capacity }} Employee
              @else
                {{ $office->capacity }} Employees
              @endif
          </span></p>
        </div>
        <!-- Capacity -->

        <!-- Bedrooms -->
        <div class="col s3">
          <i class="material-icons">hot_tub</i>
          <p><span class="title"> Bathrooms </span></p>
          <p><span class="subtitle"> {{ $office->bathroom }} </span></p>
        </div>
        <!-- Bedrooms -->

        <!-- Beds -->
        <div class="col s3">
          <i class="material-icons">ac_unit</i>
          <p><span class="title"> Air Conditioning </span></p>
          <p><span class="subtitle"> {{ $office->air_conditioning }} </span></p>
        </div>
        <!-- Beds -->

        <!-- Bathrooms -->
        <div class="col s3">
          <i class="material-icons">business_center</i>
          <p><span class="title"> Room Meeting </span></p>
          <p><span class="subtitle"> {{ $office->room_meeting }} </span></p>
        </div>
        <!-- Bathrooms -->
      </div>
      <!-- row -->

      <!-- Extras -->
      <div class="show-bottom-title">
        <i class="material-icons">weekend</i>Extras
      </div>

      <div class="row extras">
        @include('common.offices-extras')
      </div>
      <!-- Extras -->

    </div>
    <!-- Facilities -->



  </div>
  <!-- Bottom -->

</section>
@stop
