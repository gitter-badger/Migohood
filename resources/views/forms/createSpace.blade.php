<!-- Create Space -->
<!-- Form Left -->
<form form action="/space/main" method="POST" class="col s8 row" id="place">
  {{ csrf_field() }}
<div class="col s12 row">

  <h5 class="light"><i class="material-icons">content_paste</i>Listing</h5>

  <!--Type -->
  <div class="col s4">
      <p class="label left">Property Type</p>
      <select class="browser-default" name="type" id="Select" onchange="ShowInput()" required>
        <option value="" disabled selected>Choose your option</option>
        @if($previous->type == 'Department')
          <option value="Department" selected>Department</option>
          <option value="House">House</option>
          <option value="Bed and Breakfast">Bed and Breakfast</option>
          <option value="Other">Other</option>
        @endif
        @if($previous->type == 'House')
          <option value="Department" >Department</option>
          <option value="House" selected>House</option>
          <option value="Bed and Breakfast">Bed and Breakfast</option>
          <option value="Other">Other</option>
        @endif
        @if($previous->type == 'Bed and Breakfast')
          <option value="Department" >Department</option>
          <option value="House">House</option>
          <option value="Bed and Breakfast" selected>Bed and Breakfast</option>
          <option value="Other">Other</option>
        @endif
        @if($previous->type == 'Other')
        <option value="Department" >Department</option>
        <option value="House">House</option>
        <option value="Bed and Breakfast">Bed and Breakfast</option>
        <option value="Other" selected>Other</option>
        @endif
      </select>
      <!--Type -->

      <!--Other Input-->
      @if($previous->type == 'Other')
        <style>#other_service { display: block; }</style>
      @else
        <style>#other_service { display: none; }</style>
      @endif
      <div id="other_service">
        <p class="label left">Other Type</p>
        <select class="browser-default" name="other">
          <option value="" disabled selected>Choose your option</option>
          <option value='Apartment'> Apartment</option>
          <option value='Loft'> Loft</option>
          <option value='Townhouse'> Townhouse</option>
          <option value='Condominium'> Condominium</option>
          <option value='Bungalow'> Bungalow</option>
          <option value='Cabin'> Cabin</option>
          <option value='Villa'> Villa</option>
          <option value='Castle'> Castle</option>
          <option value='Dorm'> Dorm</option>
          <option value='Treehouse'> Treehouse</option>
          <option value='Boat'> Boat</option>
          <option value='Plane'> Plane</option>
          <option value='Camper/RV'> Camper/RV</option>
          <option value='Igloo'> Igloo</option>
          <option value='LightHouse'> LightHouse</option>
          <option value='Yurt'> Yurt</option>
          <option value='Cave'> Cave</option>
          <option value='Island'> Island</option>
          <option value='Chalet'> Chalet</option>
          <option value='Train'> Train</option>
          <option value='Other'> Other</option>
        </select>
      </div>
      <!--Other Input-->
  </div>
  <!--Type -->

  <!-- Accomodance -->
  <div class="col s4">
      <p class="label left">Accommodates</p>
      <select class="browser-default" name="accomodance" required>
        <option value="" disabled selected>Choose your option</option>
        @if($previous->accomodance == 'All Space')
          <option value="Department" selected>All Space</option>
          <option value="Private Room">Private Room</option>
          <option value="Shared Room">Shared Room</option>
        @endif
        @if($previous->accomodance == 'Private Room')
          <option value="Department">All Space</option>
          <option value="Private Room" selected>Private Room</option>
          <option value="Shared Room">Shared Room</option>
        @endif
        @if($previous->accomodance == 'Shared Room')
          <option value="Department">All Space</option>
          <option value="Private Room">Private Room</option>
          <option value="Shared Room" selected>Shared Room</option>
        @endif
      </select>
  </div>
  <!-- Accomodance -->

  <!-- Capacity -->
  <div class="col s4">
      <p class="label left">Capacity</p>
      <select class="browser-default" name="capacity" required>
        <option value="" disabled selected>Choose your option</option>
        <option value='1'> 1</option>
        <option value='2'> 2</option>
        <option value='3'> 3</option>
        <option value='4'> 4</option>
        <option value='5'> 5</option>
        <option value='6'> 6</option>
        <option value='7'> 7</option>
        <option value='8'> 8</option>
        <option value='9'> 9</option>
        <option value='10'> 10</option>
        <option value='11'> 11</option>
        <option value='12'> 12</option>
        <option value='13'> 13</option>
        <option value='14'> 14</option>
        <option value='15'> 15</option>
        <option value='16'> 16</option>
        <option value='16+'> 16+</option>
      </select>
  </div>
  <!-- Capacity -->
</div>


<div class="col s12">
  <br>
  <h5 class="light"><i class="material-icons">hot_tub</i>Rooms and Beds</h5>

  <!-- Bedrooms -->
  <div class="col s4">
      <p class="label left">Bedrooms</p>
      <select class="browser-default" name="bedrooms" required>
        <option value="" disabled selected>Choose your option</option>
        <option value='Studio'> Studio</option>
        <option value='1'> 1</option>
        <option value='2'> 2</option>
        <option value='3'> 3</option>
        <option value='4'> 4</option>
        <option value='5'> 5</option>
        <option value='6'> 6</option>
        <option value='7'> 7</option>
        <option value='8'> 8</option>
        <option value='9'> 9</option>
        <option value='10'> 10</option>
        <option value='10+'> 10+</option>
      </select>
    </div>
    <!-- Bedrooms -->

    <!-- Beds -->
    <div class="col s4">
        <p class="label left">Beds</p>
        <select class="browser-default" name="beds" required>
          <option value="" disabled selected>Choose your option</option>
          <option value='1'> 1</option>
          <option value='2'> 2</option>
          <option value='3'> 3</option>
          <option value='4'> 4</option>
          <option value='5'> 5</option>
          <option value='6'> 6</option>
          <option value='7'> 7</option>
          <option value='8'> 8</option>
          <option value='9'> 9</option>
          <option value='10'> 10</option>
          <option value='11'> 11</option>
          <option value='12'> 12</option>
          <option value='13'> 13</option>
          <option value='14'> 14</option>
          <option value='15'> 15</option>
          <option value='16'> 16</option>
          <option value='16+'> 16+</option>
        </select>
      </div>
      <!-- Beds -->

      <!-- Bathrooms -->
      <div class="col s4">
          <p class="label left">Bathrooms</p>
          <select class="browser-default" name="bathrooms" required>
            <option value="" disabled selected>Choose your option</option>
            <option value='None'> None</option>
            <option value='1/2'> 1/2</option>
            <option value='1'> 1</option>
            <option value='2'> 2</option>
            <option value='3'> 3</option>
            <option value='4'> 4</option>
            <option value='5'> 5</option>
            <option value='6'> 6</option>
            <option value='7'> 7</option>
            <option value='8'> 8</option>
            <option value='9'> 9</option>
            <option value='10'> 10</option>
            <option value='10+'> 10+</option>
          </select>
        </div>
        <!-- Batrooms -->

</div>

<div class="next right">
  <button type="submit" class="btn btn-save">NEXT</button>
</div>

</form>
<!-- Form Left -->

<!-- Info Right -->
<div class="col s4">
  <div class="info">
   <div class="info-body">
     <span id="yellow"><i class="material-icons">star_half</i></span>

     <h4 class="light">Let's Start!</h4>
     <p class="light">
       Post your space to everyone and start to make money is really easy!
       Migohood's Users can select certain filters to conduct their
       searches and find the accommodation that they want and need,
       so, that's the reason why you have to check some details before start
       a new announce!
     </p>
   </div>
 </div>
</div>
<!-- Info Right -->
