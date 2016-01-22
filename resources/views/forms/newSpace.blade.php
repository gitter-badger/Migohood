<!-- New Space -->
<form form action="/place" method="POST" id="place">
  {{ csrf_field() }}

  <!-- Type -->
  <div class="row col s12">
    <div class="col s1 left">
      <span>Type</span>
    </div>

    <div class="col s11 right options">
      <div class="option active tab bat">
        <i class="material-icons">business</i><br>
        <span>Department</span>
        <input name="type" type="radio" value="1" checked />
      </div>

      <div class="option tab bat" >
        <i class="material-icons">store</i><br>
        <span>House</span>
        <input name="type" type="radio" value="2" />
      </div>

      <div class="option tab bat" >
        <i class="material-icons">local_cafe</i><br>
        <span>Breakfast</span>
        <input name="type" type="radio" value="3" />
      </div>

      <div class="option tab bat" >
        <i class="material-icons">hot_tub</i><br>
        <span>Other</span>
        <input name="type" type="radio" value="other" />
      </div>

    </div>
  </div>
  <!-- Type -->

  <!-- Accomodance -->
  <div class="row col s12">
    <div class="col s1 left">
      <span>Accomodance</span>
    </div>

    <div class="col s11 right options">
      <div class="option active tab bat">
        <i class="material-icons">home</i><br>
        <span>All Space</span>
        <input name="accomodance" type="radio" value="1" checked />
      </div>

      <div class="option tab bat" >
        <i class="material-icons">hotel</i><br>
        <span>Private</span>
        <input name="accomodance" type="radio" value="2" />
      </div>

      <div class="option tab bat" >
        <i class="material-icons">group</i><br>
        <span>Shared</span>
        <input name="accomodance" type="radio" value="3" />
      </div>
    </div>
  </div>
  <!-- Accomodance -->

  <!-- Capacity -->
  <div class="row col s12"><br>
    <div class="col s1 left">
      <span>Capacity</span>
    </div>
    <div class="col s5 input">
      <select class="browser-default" name="capacity" value=" {{ old('capacity')}}">
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
  </div>
  <!-- Capacity -->

  <div class="next right">
    <button type="submit" class="btn btn-save">NEXT</button>
  </div>

</form>
<!-- New Space -->
