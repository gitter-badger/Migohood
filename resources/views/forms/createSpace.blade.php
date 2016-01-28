<!-- Create Space -->
<!-- Form Left -->
<form form action="/space/basic" method="POST" class="col s12 row" id="place">
  {{ csrf_field() }}

<!-- TOP -->
<div class="col s12 row">

  <!-- 1 . -->
  <div class="col s4">
    <h5 class="light"><i class="material-icons">event_note</i>1. Basics</h5>

      <!--Type -->
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
        <select class="browser-default" name="other_input">
          <option value="" disabled selected>Choose your option</option>
          <option value="Apartment"> Apartment</option>
          <option value="Loft"> Loft</option>
          <option value="Townhouse"> Townhouse</option>
          <option value="Condominium"> Condominium</option>
          <option value="Bungalow"> Bungalow</option>
          <option value="Cabin"> Cabin</option>
          <option value="Villa"> Villa</option>
          <option value="Castle"> Castle</option>
          <option value="Dorm"> Dorm</option>
          <option value="Treehouse"> Treehouse</option>
          <option value="Boat"> Boat</option>
          <option value="Plane"> Plane</option>
          <option value="Camper/RV"> Camper/RV</option>
          <option value="Igloo"> Igloo</option>
          <option value="LightHouse"> LightHouse</option>
          <option value="Yurt"> Yurt</option>
          <option value="Cave"> Cave</option>
          <option value="Island"> Island</option>
          <option value="Chalet"> Chalet</option>
          <option value="Train"> Train</option>
          <option value="Other"> Other</option>
        </select>
      </div>
      <!--Other Input-->

      <!-- Accomodance -->
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
      <!-- Accomodance -->

      <!-- Capacity -->
      <p class="label left">Capacity</p>
      <select class="browser-default" name="capacity" required>
        <option value="" disabled selected>Choose your option</option>
        <option value="1"> 1</option>
        <option value="2"> 2</option>
        <option value="3"> 3</option>
        <option value="4"> 4</option>
        <option value="5"> 5</option>
        <option value="6"> 6</option>
        <option value="7"> 7</option>
        <option value="8"> 8</option>
        <option value="9"> 9</option>
        <option value="10"> 10</option>
        <option value="11"> 11</option>
        <option value="12"> 12</option>
        <option value="13"> 13</option>
        <option value="14"> 14</option>
        <option value="15"> 15</option>
        <option value="16"> 16</option>
        <option value="16+"> 16+</option>
      </select>
      <!-- Capacity -->

  </div>
  <!-- 1 . -->

  <!-- 2 . -->
  <div class="col s4">
    <h5 class="light"><i class="material-icons">hotel</i>2. Dependecies</h5>

    <!-- Bedrooms -->
    <p class="label left">Bedrooms</p>
    <select class="browser-default" name="bedrooms" required>
      <option value="" disabled selected>Choose your option</option>
      <option value="Studio"> Studio</option>
      <option value="1"> 1</option>
      <option value="2"> 2</option>
      <option value="3"> 3</option>
      <option value="4"> 4</option>
      <option value="5"> 5</option>
      <option value="6"> 6</option>
      <option value="7"> 7</option>
      <option value="8"> 8</option>
      <option value="9"> 9</option>
      <option value="10"> 10</option>
      <option value="10+"> 10+</option>
    </select>
    <!-- Bedrooms -->

    <!-- Beds -->
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
    <!-- Beds -->

    <!-- Bathrooms -->
    <p class="label left">Bathrooms</p>
    <select class="browser-default" name="bathrooms" required>
      <option value="" disabled selected>Choose your option</option>
      <option value="None"> None</option>
      <option value="1/2"> 1/2</option>
      <option value="1"> 1</option>
      <option value="2"> 2</option>
      <option value="3"> 3</option>
      <option value="4"> 4</option>
      <option value="5"> 5</option>
      <option value="6"> 6</option>
      <option value="7"> 7</option>
      <option value="8"> 8</option>
      <option value="9"> 9</option>
      <option value="10"> 10</option>
      <option value="10+"> 10+</option>
    </select>
    <!-- Bathrooms -->

  </div>
  <!-- 2 . -->

  <!-- 3. -->
  <div class="col s4">
    <!-- Price-box -->
    <div class="price-box">
      <h5 class="light"><i class="material-icons">local_atm</i>3. Price</h5>
        <div class="price">
          <!-- Price -->
          <input type="text" name="price" placeholder="I want to earn?" required />

        </div>
    </div>
    <!-- Price-box -->

    <!-- Per -->
    <p class="label left">Per?</p>
    <select class="browser-default" name="per" required>
      <option value="" disabled selected>Choose your option</option>
      <option value="Night"> Night</option>
      <option value="Week"> Week</option>
      <option value="Month"> Month</option>
    </select>

    <!-- Coin -->
    <p class="label left">Type of Coin</p>
    <select class="browser-default" name="coin" required>
      <option value="" disabled selected>Choose your option</option>
      <option value="COP"> COP</option>
      <option value="USD"> USD</option>
    </select>

  </div>
  <!-- 3. -->

</div>
<!-- TOP -->

<!-- BOTTOM -->
<div class="col s12">

    <!-- 4. -->
    <div class="col s4">
      <h5 class="light"><i class="material-icons">photo_filter</i>4. Info</h5>
        <!-- Title -->
        <input type="text" name="title" placeholder="Title" required />

        <!-- Description -->
        <input type="text" name="description" placeholder="Short Description" required>
    </div>


    <!-- 5. -->
    <div class="col s4">
      <h5 class="light"><i class="material-icons">filter_center_focus</i>5. Location</h5>

      <!-- Country -->
      <input type="text" name="country" placeholder="{{ Auth::user()->country }}" required />

      <!-- City -->
      <input type="text" name="city" placeholder="City" required />

      <!-- FullAddress -->
      <input type="text" name="address" placeholder="Full address" rrequired />

      <!-- ZIP -->
      <input type="text" name="zip" placeholder="ZIP Code (Opcional)">

    </div>

    <!-- 6. -->
    <div class="col s4">
      <!-- <h5 class="light"><i class="material-icons">card_giftcard</i>6. Services</h5>-->

    </div>
    <!-- 6. -->

</div>
<!-- BOTTOM -->

<div class="next right">
  <button type="submit" class="btn btn-save">CREATE</button>
</div>

</form>
<!-- Form Left -->
