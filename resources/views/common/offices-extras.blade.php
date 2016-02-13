@if( $office->tv_cable == 'yes')
<div class="col s2">
  <i class="material-icons">tv</i>
  <p><span class="title"> Tv Cable </span></p>
</div>
@endif

@if( $office->heating == 'yes')
<div class="col s2">
  <i class="material-icons">graphic_eq</i>
  <p><span class="title"> Heating </span></p>
</div>
@endif

@if( $office->wifi == 'yes')
<div class="col s2">
  <i class="material-icons">wifi</i>
  <p><span class="title"> Wifi </span></p>
</div>
@endif

@if( $office->parking == 'yes')
<div class="col s2">
  <i class="material-icons">airport_shuttle</i>
  <p><span class="title"> Parking </span></p>
</div>
@endif

@if( $office->elevator == 'yes')
<div class="col s2">
  <i class="material-icons">poll</i>
  <p><span class="title"> Elevator </span></p>
</div>
@endif

@if( $office->smoking_allowed == 'yes')
<div class="col s2">
  <i class="material-icons">smoking_rooms</i>
  <p><span class="title"> Smoking Allowed </span></p>
</div>
@endif
