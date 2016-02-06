<!-- New Office -->
<form class="form row" action="/office/create"  method="POST" id="new_space">
  {{ csrf_field() }}

<div class="container row">

  <!-- Type  -->
  <div class="input-field col s12">
    <select name="type" required>
      <option value="" disabled selected>Choose one</option>
      <option value="All Building"> All Building</option>
      <option value="Bristro Cafe"> Bristro Cafe </option>
      <option value="Executive Board/Room"> Executive Board Room </option>
      <option value="Conference Board/Room"> Conference Board Room </option>
      <option value="Meeting Room"> Meeting Room </option>
      <option value="Co Working"> Co Working</option>
      <option value="Project Rooms"> Project Rooms</option>
      <option value="Phone Both">  Phone Both </option>
    </select>
    <label>Type of Property</label>
  </div>
  <!-- Type -->

  <!-- Accomodance  -->
  <div class="input-field col s12">
    <select name="accomodance" required>
      <option value="" disabled selected>Choose one</option>
      <option value="Private"> Private</option>
      <option value="Shared">Shared</option>
    </select>
    <label>Accomodance</label>
  </div>
  <!-- Accomodance -->

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

</div>

<div class="next right">
  <button type="submit" class="btn btn-save">NEXT</button>
</div>

</form>
<!-- New Office -->
