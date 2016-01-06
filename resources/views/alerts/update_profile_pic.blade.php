<!-- Update Status Message -->
@if (session('update_status'))
  @if (session('update_status') == 'done')
  <div class="alert-box success">
    <i class="material-icons">event_available</i><span>Done!</span> Profile picture saved.
    <a class="close" href="javascript: void(0);">  <i class="material-icons">close</i></a>
  </div>
  @else
  <div class="alert-box error">
    <i class="material-icons">event_busy</i><span>Oh Snap!</span> File format or size not allowed.
    <a class="close" href="javascript: void(0);">  <i class="material-icons">close</i></a>
  </div>
  @endif
@endif
<!-- Update Status Message -->
