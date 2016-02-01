<!-- New Space -->
<form form action="/space/create" method="POST" id="new_space">
  {{ csrf_field() }}

  <!-- Type -->
  <div class="row col s12">
    <div class="col s1 left">
      <span>Property</span>
    </div>

    <div class="col s11 right options">
      <div class="option active tab bat">
        <i class="material-icons">business</i><br>
        <span>Department</span>
        <input name="type" type="radio" value="Department" checked />
      </div>

      <div class="option tab bat" >
        <i class="material-icons">store</i><br>
        <span>House</span>
        <input name="type" type="radio" value="House" />
      </div>

      <div class="option tab bat" >
        <i class="material-icons">local_cafe</i><br>
        <span>Breakfast</span>
        <input name="type" type="radio" value="Bed and Breakfast" />
      </div>

      <div class="option tab bat" >
        <i class="material-icons">hot_tub</i><br>
        <span>Other</span>
        <input name="type" type="radio" value="Other" />
      </div>

    </div>
  </div>
  <!-- Type -->

  <!-- Accomodance -->
  <div class="row col s12">
    <div class="col s1 left">
      <span>Accommodates</span>
    </div>

    <div class="col s11 right options">
      <div class="option active tab bat">
        <i class="material-icons">home</i><br>
        <span>All Space</span>
        <input name="accomodance" type="radio" value="All Space" checked />
      </div>

      <div class="option tab bat" >
        <i class="material-icons">hotel</i><br>
        <span>Private</span>
        <input name="accomodance" type="radio" value="Private Room" />
      </div>

      <div class="option tab bat" >
        <i class="material-icons">group</i><br>
        <span>Shared</span>
        <input name="accomodance" type="radio" value="Shared Room" />
      </div>
    </div>
  </div>
  <!-- Accomodance -->

  <div class="next right">
    <button type="submit" class="btn btn-save">NEXT</button>
  </div>

</form>
<!-- New Space -->
