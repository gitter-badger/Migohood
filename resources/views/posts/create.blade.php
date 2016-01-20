@extends('layouts.app')
@section('title', 'Create Announce')
@section('content')

<!-- Options NavBar -->
<!--
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li class="active"><a href="{{ url('create') }}">Basic Info</a></li>
      <li><a href="#" class="underline">Description</a></li>
      <li><a href="#" class="underline">Location</a></li>
      <li><a href="#" class="underline">Services</a></li>
      <li><a href="#" class="underline">Extras</a></li>
    </ul>

  </div>
</nav>
</div>
</div>-->

<!-- Content -->
<section class="body" id="new">
  <div class="container col s12">

    <!-- Box -->
    <div class="box">
      <!-- Box-body -->
      <div class="box-body">
        <div class="box-title">
          <i class="material-icons">library_add</i>Create Announce
        </div>

      <!-- Create_Form -->
      <div class="row" id="create_form">

        <!-- Left -->
        <div class="col s12 l8 row">

            <div class="option active tab bat" onclick="show('form_space')">
              <i class="material-icons">pin_drop</i><br>
              <span>Space</span>
            </div>

            <div class="option tab bat" onclick="show('form_service')">
                <i class="material-icons">business_center</i><br>
                <span>Service</span>
            </div>

            <!-- Form_Space -->
            <div id="form_space" class="dynamic_link" style="display:visible">
              @include('forms.newSpace')
            </div>

            <!-- Form_Service -->
            <div id="form_service" class="dynamic_link" style="display:none">
              @include('forms.newService')
            </div>

        </div>
        <!-- Left -->
        <!-- Right -->
        <div class="col s12 l4">
          <div class="info">
            <div class="info-body">
              <h4 class="light">Let's get Started</h4>
              <p class="light">
                Post your spaces or service to all to start making money,
                remember that people who come to your city need you.
                Migohood's Users can select certain filters to conduct their
                searches and find the accommodation or services they want and need.
              </p>
            </div>
          </div>
        </div>
        <!-- Right -->
       </div>
      <!-- Create form -->
      </div>
      <!-- Box-body -->
    </div>
    <!-- Box -->

  </div>
</section>
@stop
