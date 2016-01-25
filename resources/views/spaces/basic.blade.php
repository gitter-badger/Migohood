@extends('layouts.app')
@section('title') New Announce: {{ $previous->type }} - {{ $previous->accomodance }} @stop
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
        @include('forms.createSpace')
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
         <img src="/img/app/smart.png" alt="" />

         <h4 class="light">Tips!</h4>
         <p class="light">
           Every space on Migohood is unique. Highlight what makes your listing welcoming so that it stands out to guests who want to stay in your area.
         </p>
       </div>
     </div>
    </div>
    <!-- Info Right -->
  </div>
  <!-- Container -->
</section>
@stop
