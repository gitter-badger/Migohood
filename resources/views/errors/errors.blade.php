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

<!-- Success -->
@if (session('status'))
   <div class="success-box">
     <div class="success-title">
       <i class="material-icons">check</i><strong>Oh Yeah!</strong> It's done
     </div>
     <div class="alert-content">
       {{ session('status') }} <br> Password reset link expires after one hour.
     </div>
   </div>
@endif
