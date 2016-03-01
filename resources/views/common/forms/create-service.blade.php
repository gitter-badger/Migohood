<form action="{{ route('create', ['resource' => 'service' ]) }}" method="POST">
    {{ csrf_field() }}

    <div class="subtitle">
      <span>Type of Service</span>
    </div>

    <!-- First Toggle Btn Group -->
    <div class="toggle-btn-grp">

      <label onclick="" class="toggle-btn success">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="apartment" checked/>
        <i class="material-icons">local_activity</i><br>
        <span>Tourism</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="house"/>
        <i class="material-icons">school</i><br>
        <span>Educational</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="B &amp; B"/>
        <i class="material-icons">local_library</i><br>
        <span>Cultural</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">tag_faces</i><br>
        <span>Recreational</span>
      </label> <br>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">local_florist</i><br>
        <span>Eco</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">directions_bike</i><br>
        <span>Adventure</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">fitness_center</i><br>
        <span>Fitness</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">photo_camera</i><br>
        <span>Photography</span>
      </label> <br>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">child_friendly</i><br>
        <span>Family/Kids</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">pets</i><br>
        <span>Pets</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">face</i><br>
        <span>Personal</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">local_shipping</i><br>
        <span>Transport</span>
      </label> <br>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">golf_course</i><br>
        <span>Sports</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">build</i><br>
        <span>Handy Man</span>
      </label>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">vpn_key</i><br>
        <span>Concierge</span>
      </label>

      <label onclick="" class="toggle-btn" id="lil">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">pan_tool</i><br>
        <span>Promoter</span>
      </label> <br>

      <label onclick="" class="toggle-btn">
        <span><i class="material-icons">check</i></span>
        <input type="radio" name="type" value="other"/>
        <i class="material-icons">help</i><br>
        <span>24/7 Assitance</span>
      </label>

    </div>
    <!-- End of First Toggle Btn Group -->

    <!-- Next Button -->
    <div class="next">
      <button type="submit" class="btn ">NEXT</button>
    </div>
    <!-- End of Next Button -->
</form>
