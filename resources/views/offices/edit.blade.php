@extends('layouts.edit')
@section('title')
  Edit - {{ $office->type }}, {{ $office->accomodance }}
@stop

@section('content')
  <!-- Uddate Space Basics -->
  <form class="form row" id="edit_office" form action="{{ route('office.update', ['hash' => $office->hash ]) }}" method="POST">
    {{ csrf_field() }}

  <!-- Title 1 -->
  <div class="title col s12">
     <h5>Give more details</h5>
     <p  class="light">People can filter by listing basics to find an office they like. </p>
     <div class="divider"></div>
  </div>


  <!-- Type of Property -->
  <div class="input-field col s4">
    <select name="type" required>
      <option value="" disabled selected>Choose one</option>
      <option value="Private" @if($office->type == 'Private') selected="selected" @endif>Private</option>
      <option value="Shared" @if($office->type == 'Shared') selected="selected" @endif>Shared</option>
    </select>
    <label>Type of Property</label>
  </div>
  <!-- Type of Property -->

  <!-- Accomodance -->
  <div class="input-field col s4">
    <select name="accomodance" required>
      <option value="" disabled selected>Choose one</option>
      <option value="All Building" @if($office->accomodance == 'All Building') selected="selected" @endif>All Building</option>
      <option value="Bristro Cafe" @if($office->accomodance == 'Bristro Cafe') selected="selected" @endif>Bristro Cafe </option>
      <option value="Executive Board/Room" @if($office->accomodance == 'Executive Board/Room') selected="selected" @endif> Executive Board Room </option>
      <option value="Conference Board/Room" @if($office->accomodance == 'Conference Board/Room') selected="selected" @endif> Conference Board Room </option>
      <option value="Meeting Room" @if($office->accomodance == 'Meeting Room') selected="selected" @endif> Meeting Room </option>
      <option value="Co Working" @if($office->accomodance == 'Co Working') selected="selected" @endif> Co Working</option>
      <option value="Project Rooms" @if($office->accomodance == 'Project Rooms') selected="selected" @endif> Project Rooms</option>
      <option value="Phone Both" @if($office->accomodance == 'Phone Both') selected="selected" @endif>  Phone Both </option>
    </select>
    <label>Accomodance</label>
  </div>
  <!-- Accomodance -->

  <!-- Capacity  -->
  <div class="input-field col s4">
    <select name="capacity" required>
      <option value="" disabled selected>Choose one</option>
      <option value="1" @if($office->capacity == '1') selected="selected" @endif> 1 </option>
      <option value="2" @if($office->capacity == '2') selected="selected" @endif> 2 </option>
      <option value="3" @if($office->capacity == '3') selected="selected" @endif> 3 </option>
      <option value="4" @if($office->capacity == '4') selected="selected" @endif> 4 </option>
      <option value="5" @if($office->capacity == '5') selected="selected" @endif> 5 </option>
      <option value="6" @if($office->capacity == '6') selected="selected" @endif> 6</option>
      <option value="7" @if($office->capacity == '7') selected="selected" @endif> 7</option>
      <option value="8" @if($office->capacity == '8') selected="selected" @endif> 8 </option>
      <option value="9" @if($office->capacity == '9') selected="selected" @endif> 6</option>
      <option value="10" @if($office->capacity == '10') selected="selected" @endif> 10</option>
      <option value="11" @if($office->capacity == '11') selected="selected" @endif> 11 </option>
      <option value="12" @if($office->capacity == '12') selected="selected" @endif> 12</option>
      <option value="13" @if($office->capacity == '13') selected="selected" @endif> 13</option>
      <option value="14" @if($office->capacity == '14') selected="selected" @endif> 14 </option>
      <option value="15" @if($office->capacity == '15') selected="selected" @endif> 15 </option>
      <option value="16" @if($office->capacity == '16') selected="selected" @endif> 16 </option>
      <option value="17" @if($office->capacity == '17') selected="selected" @endif> 17 </option>
      <option value="18" @if($office->capacity == '18') selected="selected" @endif> 18 </option>
      <option value="19" @if($office->capacity == '19') selected="selected" @endif> 19 </option>
      <option value="20" @if($office->capacity == '20') selected="selected" @endif> 20 </option>
      <option value="20+" @if($office->capacity == '20+') selected="selected" @endif> 20+ </option>
    </select>
    <label>Capacity</label>
  </div>
  <!-- Capacity -->

  <!-- Title -->
  <div class="input-field col s12">
    <input Placeholder="Type some cool title" id="title" type="text" name="title" required @if($office->title != 'null') value="{{ $office->title }}" @endif>
    <label class="active" for="title">Title</label>
  </div>
  <!-- Title -->

  <!-- Description -->
  <div class="input-field col s12">
    <input Placeholder="Type some cool description" id="description" type="text" name="description" required @if($office->description != 'null') value="{{ $office->description }}" @endif>
    <label class="active" for="description">Short Description</label>
  </div>
  <!-- Description -->




  <!-- Title 2 -->
  <div class="title col s12">
     <h5>Location</h5>
     <p  class="light">Provide as accurated as posible your address</p>
     <div class="divider"></div>
  </div>


  <!-- Country -->
  <div class="input-field col s6">
    <input Placeholder="What's your country?" id="country" type="text" name="country" required @if($office->country != 'null') value="{{ $office->country }}" @endif>
    <label class="active" for="country">Country</label>
  </div>
  <!-- Country -->

  <!-- City -->
  <div class="input-field col s6">
    <input Placeholder="Type your city" id="city" type="text" name="city" required @if($office->city != 'null') value="{{ $office->city }}" @endif>
    <label class="active" for="city">City</label>
  </div>
  <!-- City -->

  <!-- Address -->
  <div class="input-field col s6">
    <input Placeholder="Type your address" id="address" type="text" name="address" required @if($office->address != 'null') value="{{ $office->address }}" @endif>
    <label class="active" for="address">Address</label>
  </div>
  <!-- Address -->

  <!-- zip -->
  <div class="input-field col s6">
    <input Placeholder="Type ZIP" id="zip" type="text" name="zip" @if($office->zip != 'null') value="{{ $office->zip }}" @endif>
    <label class="active" for="zip">ZIP (optional)</label>
  </div>
  <!-- zip -->

  <!-- Loction  -->
  <div class="input-field col s12">
    <input Placeholder="Type references about your location" id="location" type="text" name="location_references" required @if($office->location_references != 'null') value="{{ $office->location_references }}" @endif>
    <label class="active" for="location">Location References </label>
  </div>
  <!-- Location -->




  <!-- Title 3 -->
  <div class="title col s12">
     <h5>Pricing</h5>
     <p  class="light">Choose your own price.</p>
     <div class="divider"></div>
  </div>

  <!-- Price -->
  <div class="input-field col s6">
    <input Placeholder="Type a value here. Ex. 23.00" id="title" type="text" name="price" required @if($office->price != 'null') value="{{ $office->price }}" @endif>
    <label class="active" for="title">Price</label>
  </div>
  <!-- Price -->

  <!-- Type of Property -->
  <div class="input-field col s3">
    <select name="per" required>
      <option value="" disabled selected>Choose one</option>
      <option value="Hour" @if($office->per == 'Hour') selected="selected" @endif>Hour</option>
      <option value="Week" @if($office->per == 'Week') selected="selected" @endif>Week</option>
      <option value="Month" @if($office->per == 'Month') selected="selected" @endif>Month</option>
    </select>
    <label>Per?</label>
  </div>
  <!-- Type of Property -->

  <!-- Currency -->
  <div class="input-field col s3">
    <select name="currency" required >
      <option value="" disabled selected>Choose one</option>
      <option value="USD" @if($office->currency == 'USD') selected="selected" @endif>USD </option>
      <option value="COP" @if($office->currency == 'COP') selected="selected" @endif>COP</option>
    </select>
    <label>Currency</label>
  </div>
  <!-- Currency -->



  <!-- Title 3 -->
  <div class="title col s12">
     <h5>Extras</h5>
     <p  class="light">Additional Amenities makes your announce interesting. Choose what you have.</p>
     <div class="divider"></div>
  </div>


  <div class="container extras">

    <div class="col s6">
      <p>
        <input type="checkbox" name="bathroom" value="yes" id="bathroom" @if($office->bathroom == 'yes') checked="checked" @endif />
        <label for="bathroom">Bathroom</label>
      </p>

      <p>
        <input type="checkbox" name="tv_cable" value="yes" id="tv_cable" @if($office->tv_cable == 'yes') checked="checked" @endif />
        <label for="tv_cable">Tv Cable</label>
      </p>

      <p>
        <input type="checkbox" name="air_conditioning" value="yes" id="air_conditioning" @if($office->air_conditioning == 'yes') checked="checked" @endif />
        <label for="air_conditioning">Air Conditioning</label>
      </p>

      <p>
        <input type="checkbox" name="heating" value="yes" id="heating" @if($office->heating == 'yes') checked="checked" @endif />
        <label for="heating">Heating</label>
      </p>

      <p>
        <input type="checkbox" name="wifi" value="yes" id="wifi" @if($office->wifi == 'yes') checked="checked" @endif />
        <label for="wifi">Wifi</label>
      </p>
    </div>

    <div class="col s6">
      <p>
        <input type="checkbox" name="parking" value="yes" id="parking" @if($office->parking == 'yes') checked="checked" @endif />
        <label for="parking">Parking</label>
      </p>

      <p>
        <input type="checkbox" name="elevator" value="yes" id="elevator" @if($office->elevator == 'yes') checked="checked" @endif />
        <label for="elevator">Elevator</label>
      </p>

      <p>
        <input type="checkbox" name="room_meeting" value="yes" id="room_meeting" @if($office->room_meeting == 'yes') checked="checked" @endif />
        <label for="room_meeting">Room Meeting</label>
      </p>

      <p>
        <input type="checkbox" name="smoking_allowed" value="yes" id="smoking_allowed" @if($office->smoking_allowed == 'yes') checked="checked" @endif />
        <label for="smoking_allowed">Smooking Allowed</label>
      </p>

    </div>

  </div>

  <!-- Submit -->
  <div class="col s12 submit">
    <div class="left">
      <a href="{{ route('office.show', ['hash' => $office->hash ]) }}" class="btn btn-back">
         @if($office->public == 'no') Preview @else Show @endif
      </a>
    </div>

    <div class="right">
      <button type="submit" class="btn btn-save" id="next">Save until here</button>
    </div>
  </div>
  <!-- Submit -->
</form>
<!-- Uddate Space Basics -->

<!-- Title -->
<div class="title">
   <h5>Tumbnail</h5>
   <p class="light">Everyone love view pictures of places they are interested in. Start with a thumbnail.
   This is almost the most important, is the first picture that hoster will see. </p>
   <div class="divider"></div>
</div>

<form class="form row" id="pic" action="{{ route('office.thumbnail.update', ['hash' => $office->hash ]) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="thumb center col s7">
      <img class="materialboxed" src="{{ $office->thumbnail }}" alt="" />
    </div>

    <div class="col s5 file-field input-field">
     <div class="btn btn-update">
       <span>Update</span>
       <input type="file" name="file">
     </div>
     <div class="file-path-wrapper">
       <input class="file-path validate" type="text">
     </div>
   </div>

   <div class="col s5 submit">
      <input type="submit" class="btn btn-submit" value="Save"/>
   </div>

</form>

<form class="" id="pic" action="{{ route('office.gallery.update', ['hash' => $office->hash ]) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="file[]" multiple><br><br>
    <div class="col s4 submit">
       <input type="submit" class="btn btn-submit" value="Save"/>
    </div>
    @if (count($photos) == 0)
    <div class="col s8">
      <div class="col s6 pics">
          <img class="materialboxed" src="/img/app/thumbnail.png" alt=""/>
      </div>
      <div class="col s6 pics">
          <img class="materialboxed" src="/img/app/thumbnail.png" alt=""/>
      </div>
    </div>
    @else
    <div class="col s8 row">
      @foreach ($photos as $photo)
        <div class="col s6 pics">
          <img class="materialboxed" src="{{ $photo->path }}" alt="" width="200px"/>
        </div>
      @endforeach
    </div>
    @endif
</form>

<div class="form row">
  <!-- Submit -->
  <div class="col s12 submit">
    <div class="left">
      <a href="{{ route('office.show', ['hash' => $office->hash ]) }}" class="btn btn-back">
         @if($office->public == 'yes') Show @endif
      </a>
    </div>

    <div class="right">
      <a href="{{ url('/myoffices' )}}" class="btn btn-save" id="next">Finish </a>
    </div>
  </div>
  <!-- Submit -->
</div>


@stop

@section('info')
  @if($office->public == 'no')
    <img src="/img/app/space.png" alt="" />
      <h4 class="light">It's done</h4>
      <p class="light">
        Your new Office has been created, but.. It's not public yet. Please proceed to next steps
        to have your space available for rent.
      </p>
  @else
  <img src="/img/app/graph.png" alt="" />
    <h4 class="light">It's done</h4>
    <p class="light">
      Your Space is public now.. You can start making money.
      Off course you can proceed to next steps to improve your announce,
      giving more details or editing those that you provied before makes
      your space better.
    </p>
  @endif
@stop
