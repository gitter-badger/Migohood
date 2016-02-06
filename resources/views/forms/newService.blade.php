<!-- New Service -->
<form class="form row" action="/service/create"  method="POST" id="new_space">
  {{ csrf_field() }}

  <div class="container row">

    <!-- Type  -->
    <div class="input-field col s6">
      <select name="type" required>
        <option value="" disabled selected>Choose one</option>
        <option value='Turism'> Turism</option>
        <option value='Education'> Education</option>
        <option value='Culture'> Culture</option>
        <option value='Eco'> Eco</option>
        <option value='Recreation'> Recreation</option>
        <option value='Family'> Family</option>
        <option value='Pets'> Pets</option>
        <option value='Production'> Production</option>
        <option value='Personal'> Personal</option>
        <option value='Maintance'> Maintance</option>
        <option value='Promote'> Promote</option>
        <option value='Transportation'>Transportation</option>
        <option value='Other'> Other</option>
      </select>
      <label>Type of Service</label>
    </div>
    <!-- Type -->

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

  </div>

<div class="next right">
  <button type="submit" class="btn btn-save">NEXT</button>
</div>

</form>
<!-- New Service -->
