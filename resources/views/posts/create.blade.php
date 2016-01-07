@extends('layouts.app')
@section('title', 'Create Announce')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li class="active"><a href="{{ url('/posts/create') }}">Basic Info</a></li>
      <li><a href="#" class="underline">Description</a></li>
      <li><a href="#" class="underline">Location</a></li>
      <li><a href="#" class="underline">Services</a></li>
      <li><a href="#" class="underline">Extras</a></li>
    </ul>

  </div>
</nav>
</div>
</div>

<!-- Content -->
<section class="body">
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
        <div class="col s7">

            <div class="option active tab bat"  onclick="show('form_space')">
              <i class="material-icons">store_mall_directory</i><br>
              <span>Space</span>
            </div>

            <div class="option tab bat" onclick="show('form_service')">
                <i class="material-icons">location_city</i><br>
                <span>Service</span>
            </div>

            <!-- Form_Space -->
            <div id="form_space" class="dynamic_link" style="display:visible">
               <p>Link 1 Content Displayed</p>
            </div>

            <!-- Form_Service -->
            <div id="form_service" class="dynamic_link" style="display:none">
               <p>Link 2 Content Displayed</p>
            </div>

        </div>
        <!-- Left -->
        <!-- Right -->
        <div class="col s5">
          <div class="info">
            <div class="info-body">
              <h4 class="light">Let's get Started</h4>
              <p class="light">
                Post your spaces or service to all to start making money.
                Remember that people who come to your city need you.
                Migohood's Users can select certain filters on the
                of the space to conduct their searches and find the
                accommodation they want and need.
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
