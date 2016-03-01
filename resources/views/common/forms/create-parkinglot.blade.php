<form action="{{ route('create', ['resource' => 'parkinglot' ]) }}" method="POST">
    {{ csrf_field() }}

    <div class="subtitle">
      <span>Type of Parking</span>
    </div>

    <!-- First Toggle Btn Group -->
    <div class="toggle-btn-grp">

      <label onclick="" class="toggle-btn success">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="apartment" checked/>
        <i class="material-icons">airport_shuttle</i><br>
        <span>Carport</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="house"/>
        <i class="material-icons">power_input</i><br>
        <span>Single-level</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="B &amp; B"/>
        <i class="material-icons">dehaze</i><br>
        <span>Multi-storey</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">directions_bus</i><br>
        <span>Other</span>
      </label>

    </div>
    <!-- End of First Toggle Btn Group -->

    <!-- Next Button -->
    <div class="next">
      <button type="submit" class="btn ">NEXT</button>
    </div>
    <!-- End of Next Button -->
</form>
