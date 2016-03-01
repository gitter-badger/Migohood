<form action="{{ route('create', ['resource' => 'space' ]) }}" method="POST">
    {{ csrf_field() }}

    <div class="subtitle">
      <span>Type of Space</span>
    </div>

    <!-- First Toggle Btn Group -->
    <div class="toggle-btn-grp">

      <label onclick="" class="toggle-btn success">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="Apartment" checked/>
        <i class="material-icons">business</i><br>
        <span>Apartment</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="House"/>
        <i class="material-icons">store</i><br>
        <span>House</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="B &amp; B"/>
        <i class="material-icons">local_cafe</i><br>
        <span>B &amp; B</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="Other"/>
        <i class="material-icons">directions_boat</i><br>
        <span>Other</span>
      </label>

    </div>
    <!-- End of First Toggle Btn Group -->

    <div class="subtitle">
      <span>Type of Room</span>
    </div>

    <!-- Second Toggle Btn Group -->
    <div class="toggle-btn-grp ">

      <label onclick="" class="toggle-btn success">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="room" value="Private" checked/>
        <i class="material-icons">person</i><br>
        <span>Private</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="room" value="Shared"/>
        <i class="material-icons">group</i><br>
        <span>Shared</span>
      </label>

    </div>
    <!-- End of Second Toggle Btn Group -->

    <!-- Next Button -->
    <div class="next">
      <button type="submit" class="btn ">NEXT</button>
    </div>
    <!-- End of Next Button -->
</form>
