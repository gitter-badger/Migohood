@extends('layouts.app')
@section('title', 'Host')
@section('content')
<!-- Body -->
<div class="body container row">
  <!-- Box -->
  <div class="box col s12 m12 l9">
    <!-- Box Body -->
    <div class="box-body">

      <div class="box-title">
        <i class="material-icons">library_add</i>Create New Announce
      </div>

      <!-- Box Create -->
      <div class="box-create">

      <!-- Toggle Btn Group -->
        <div class="toggle-btn-grp center">

          <label onclick="" class="toggle-btn">
            <input type="radio" name="typeof" id="space"/>
            <i class="material-icons">place</i><br>
            <span>Space</span>
          </label>

          <label onclick="" class="toggle-btn">
            <input type="radio" name="typeof" id="workspace"/>
            <i class="material-icons">work</i><br>
            <span>Workspace</span>
          </label>

          <label onclick="" class="toggle-btn">
            <input type="radio" name="typeof" id="parking"/>
            <i class="material-icons">directions_car</i><br>
            <span>Parking Lot</span>
          </label>

          <label onclick="" class="toggle-btn">
            <input type="radio" name="typeof" id="service"/>
            <i class="material-icons">local_play</i><br>
            <span>Service</span>
          </label>

        </div>
        <!-- End of Toggle Btn Group -->

        <!-- Create Forms -->
        <div id="space-form" style="display:none">
          Space Form
        </div>

        <div id="workspace-form" style="display:none">
          Workspace Form
        </div>

        <div id="parking-form" style="display:none">
          Parking Form
        </div>

        <div id="service-form" style="display:none">
          Service Form
        </div>
        <!-- End of Create Forms -->

      </div>
      <!-- End of Box Create -->

    </div>
    <!-- End of Box Body -->
  </div>
  <!-- End of Box -->

  <!-- Info Right -->
  <div class="col l3 right hide-on-med-and-down">
    <div class="info">
     <div class="info-body">
       <img src="/img/app/map.png" alt="" />
       <h4 class="light">Let's Start!</h4>
       <p class="light">
          List your space, and start making money. Another way of getting pay at Migo Hood’s is to offer a service to those traveling to your city. You can also offer a service while you are travelling. Here you have many ways of making a profit.
       </p>
     </div>
   </div>
  </div>
  <!-- End of Info Right -->

</div>
<!-- End of Body -->
@stop
