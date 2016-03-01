<form action="{{ route('create', ['resource' => 'workspace' ]) }}" method="POST">
    {{ csrf_field() }}

    <div class="subtitle">
      <span>Type of Workspace</span>
    </div>

    <!-- First Toggle Btn Group -->
    <div class="toggle-btn-grp">

      <label onclick="" class="toggle-btn success">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="apartment" checked/>
        <i class="material-icons">business_center</i><br>
        <span>Business Center</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="house"/>
        <i class="material-icons">pages</i><br>
        <span>Corporate Office</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="B &amp; B"/>
        <i class="material-icons">flip</i><br>
        <span>Coworking Space</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">view_compact</i><br>
        <span>Other Workspace</span>
      </label>

    </div>
    <!-- End of First Toggle Btn Group -->

    <div class="subtitle">
      <span>Workspace Type</span>
    </div>

    <!-- Second Toggle Btn Group -->
    <div class="toggle-btn-grp ">

      <label onclick="" class="toggle-btn success">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="room" value="private" checked/>
        <i class="material-icons">person</i><br>
        <span>Private</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="room" value="shared"/>
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
