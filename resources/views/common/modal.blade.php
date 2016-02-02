<!-- Modal Structure -->
<div id="choose" class="modal">
  <div class="modal-content center">
    <h4>New Announce</h4>
    <p>Please choose one</p>

    <!-- New Announce -->
    <form form action="/create" class="row col s12 options center" method="POST" id="modal">
      {{ csrf_field() }}

      <div class="option active tab bat">
        <i class="material-icons">location_city</i><br>
        <span>Space</span>
        <input name="type" type="radio" value="Space" checked />
      </div>

      <div class="option tab bat" >
        <i class="material-icons">receipt</i><br>
        <span>Service</span>
        <input name="type" type="radio" value="Service" />
      </div>

      <div class="next center">
        <button type="submit" class="btn btn-modal">Continue</button>
      </div>

    </form>
    <!-- New Space -->

    </div>
      <!-- modal-action modal-close -->



  </div>
</div>
<!-- Modal Structure -->
