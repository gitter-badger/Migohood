@extends('layouts.edit')
@section('title', 'Create Service')
@section('content')
  <!-- Uddate Space Basics -->
  <form class="form row" id="edit_office" form action="" method="POST">
    {{ csrf_field() }}

  <!-- Title 1 -->
  <div class="title col s12">
     <h5>Create a Quick Service</h5>
     <p  class="light">People can filter by listing basics to find a service they need. </p>
     <div class="divider"></div>
  </div>

  <!-- Capacity  -->
  <div class="input-field col s6">
    <select name="capacity" required>
      <option value="" disabled selected>Choose one</option>
      <option value="1"> 1 </option>
      <option value="2"> 2 </option>
      <option value="3"> 3 </option>
      <option value="4"> 4 </option>
      <option value="5"> 5 </option>
      <option value="6"> 6</option>
      <option value="7"> 7</option>
      <option value="8"> 8 </option>
      <option value="9"> 6</option>
      <option value="10"> 10</option>
      <option value="11"> 11 </option>
      <option value="12"> 12</option>
      <option value="13"> 13</option>
      <option value="14"> 14 </option>
      <option value="15"> 15 </option>
      <option value="16"> 16 </option>
      <option value="17"> 17 </option>
      <option value="18"> 18 </option>
      <option value="19"> 19 </option>
      <option value="20"> 20 </option>
      <option value="20+"> 20+ </option>
    </select>
    <label>Capacity</label>
  </div>
  <!-- Capacity -->

  <!-- Title -->
  <div class="input-field col s12">
    <input Placeholder="Type some cool title" id="title" type="text" name="title" required>
    <label class="active" for="title">Title</label>
  </div>
  <!-- Title -->

  <!-- Description -->
  <div class="input-field col s12">
    <input Placeholder="Type some cool description" id="description" type="text" name="description" required>
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
    <input Placeholder="What's your country?" id="country" type="text" name="country">
    <label class="active" for="country">Country</label>
  </div>
  <!-- Country -->

  <!-- City -->
  <div class="input-field col s6">
    <input Placeholder="Type your city" id="city" type="text" name="city">
    <label class="active" for="city">City</label>
  </div>
  <!-- City -->

  <!-- Address -->
  <div class="input-field col s6">
    <input Placeholder="Type your address" id="address" type="text" name="address">
    <label class="active" for="address">Address</label>
  </div>
  <!-- Address -->

  <!-- zip -->
  <div class="input-field col s6">
    <input Placeholder="Type ZIP" id="zip" type="text" name="zip">
    <label class="active" for="zip">ZIP (optional)</label>
  </div>
  <!-- zip -->

  <!-- Loction  -->
  <div class="input-field col s12">
    <input Placeholder="Type references about your location" id="location" type="text" name="location_references">
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
    <input Placeholder="Type a value here. Ex. 23.00" id="title" type="text" name="price">
    <label class="active" for="title">Price</label>
  </div>
  <!-- Price -->

  <!-- Type of Property -->
  <div class="input-field col s3">
    <select name="per" required>
      <option value="" disabled selected>Choose one</option>
      <option value="Hour">Hour</option>
      <option value="Week">Week</option>
      <option value="Month">Month</option>
    </select>
    <label>Per?</label>
  </div>
  <!-- Type of Property -->

  <!-- Currency -->
  <div class="input-field col s3">
    <select name="currency" required >
      <option value="" disabled selected>Choose one</option>
      <option value="USD">USD </option>
      <option value="COP">COP</option>
    </select>
    <label>Currency</label>
  </div>
  <!-- Currency -->


  <!-- Submit -->
  <div class="col s12 submit">
    <div class="left">
      <a href=" " class="btn btn-back">

      </a>
    </div>

    <div class="right">
      <button type="submit" class="btn btn-save" id="next">Save until here</button>
    </div>
  </div>
  <!-- Submit -->
</form>
<!-- Uddate Space Basics -->


@stop

@section('info')
    <img src="/img/app/space.png" alt="" />
      <h4 class="light">It's easy</h4>
      <p class="light">
        Create a service is too easy that just simply fill this form and you'll have a service published and available
        for making money.
      </p>
@stop
