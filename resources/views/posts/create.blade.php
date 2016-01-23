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
          <i class="material-icons">library_add</i>Create New Announce
        </div>

      <!-- Create_Form -->
      <div class="row" id="create_form">
            <div class="col s11 offset-s1">
              <div class="option active tab bat" onclick="show('form_space')">
                <i class="material-icons">pin_drop</i><br>
                <span>Space</span>
              </div>

              <div class="option tab bat" onclick="show('form_service')">
                  <i class="material-icons">business_center</i><br>
                  <span>Service</span>
              </div>
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
      <!-- Create form -->
      </div>
      <!-- Box-body -->
    </div>
    <!-- Box -->

  </div>
</section>
@stop
