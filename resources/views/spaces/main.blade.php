@extends('layouts.app')
@section('title')
  Main - {{ $space->def_title }}
@stop
@section('content')
<section class="body" id="new">
  <!-- Container -->
  <div class="container row">
    <!-- Box -->
    <div class="box col s9">
      <!-- Box-body -->
      <div class="box-body">
      <!-- Create_Form -->
      <div class="row" id="create_form">
        @include('forms.createMainSpace')
       </div>
      <!-- Create form -->
      </div>
      <!-- Box-body -->
    </div>
    <!-- Box -->

    <!-- Info Right -->
    <div class="col s3">
      <div class="info">
       <div class="info-body">
         <!--<span id="yellow"><i class="material-icons">star_half</i></span>-->
         <img src="/img/app/search.png" alt="" />

         <h4 class="light">Place created!</h4>
         <p class="light"> Watch it as a previous, following this link</p>
           <a class="btn" href="{{ url('/space/'.$space->hash) }}">Go!</a>.
         </p>
       </div>
     </div>
    </div>
    <!-- Info Right -->
  </div>
  <!-- Container -->
</section>
@stop
