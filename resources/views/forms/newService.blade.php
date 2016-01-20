<!-- New Service -->
<form form action="/service" method="POST" id="place">
  {{ csrf_field() }}

  <!-- Type -->
  <div class="row col s12"><br>
    <div class="col s1 left">
      <span>Type</span>
    </div>
    <div class="col s5 input">
      <select class="browser-default" name="type" id="Select" onchange="ShowInput()" value="{{ old('type') }}">
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
    </div>
  </div>
  <!-- Type -->

  <!-- Other Service -->
  <div class="row col s12" id="other_service" style="display: none;"><br>
    <div class="col s1 left">
      <span>Other</span>
    </div>
    <div class="col s5 input">
      <input placeholder="Which one?" name="other" value="{{ old('other') }}" type="text">
    </div>
  </div>
  <!-- Other Service -->

  <!-- Title -->
  <div class="row col s12"><br>
    <div class="col s1 left">
      <span>Title</span>
    </div>
    <div class="col s5 input">
      <input placeholder="Make a short-custom title for your service" name="title" value="{{ old('title') }}" type="text" length="50">
    </div>
  </div>
  <!-- Title -->

  <!-- Description -->
  <div class="row col s12"><br>
    <div class="col s1 left">
      <span>Description</span>
    </div>
    <div class="col s5 input">
      <input type="text" name="description" value="{{ old('description') }}" placeholder="Cool name without a cool description?" length="200">
    </div>
  </div>
  <!-- Description -->

  <div class="next right">
    <button type="submit" class="btn btn-save">NEXT</button>
  </div>

</form>
<!-- New Service -->
