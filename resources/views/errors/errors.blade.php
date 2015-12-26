<!-- Errors -->
@if (count($errors) > 0)
<div class="error-box">
  <div class="error-title">
    <i class="material-icons">close</i><strong>Woops!</strong> Something is wrong
  </div>
  <div class="alert-content">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
</div>
@endif
