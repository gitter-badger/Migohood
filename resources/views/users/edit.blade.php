@extends('layouts.app')
@section('title', 'Profile Settings')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li class="active"><a href="{{ url('/settings/profile') }}">Profile</a></li>
      <li><a href="#" class="underline">Account</a></li>
      <li><a href="#" class="underline">Security</a></li>
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
        <i class="material-icons">person_pin</i>Basic Information
      </div>

      <!--Edit-->
      <div class="row" id="edit">

        <!-- Update Status Message -->
        @if (session('update_status'))
          @if (session('update_status') == 'done')
          <div class="alert-box success">
            <i class="material-icons">event_available</i><span>Done!</span> Profile picture saved.
            <a class="close" href="javascript: void(0);"><i class="material-icons">close</i></a>
          </div>
          @else
          <div class="alert-box error">
            <i class="material-icons">event_busy</i><span>Oh Snap!</span> File format or size not allowed.
            <a class="close" href="javascript: void(0);"><i class="material-icons">close</i></a>
          </div>
          @endif
        @endif
        <!-- Update Status Message -->

        <!-- Change Profile Picture -->
          <div class="col s2 left">
            <span>Profile Picture</span>
          </div>

          <div class="col s10 row right">

            <div class="col s2">
             <img class="materialboxed" src =" {{ url(Auth::user()->path) }} " alt="..."/>
            </div>

            <!-- Change picture Form -->
            <div class="col s4">
              <form method="post" action="{{ url('/avatar/update') }}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="file-field input-field">
                  <div class="btn btn-upload">
                    <span>Choose File</span>
                    <input type="file" name="image">
                  </div>
                </div>
                  <button type="submit" class="btn btn-save"><i class="material-icons">save</i></button>
                  <!--<a href="#" class="btn btn-sub"><i class="material-icons">delete</i></a>-->
              </form>
            </div>
            <!-- Change picture Form -->

            <div class="col s6">
              <div class="info">
                <div class="info-body">
                  <h4 class="light">Why a Picture?</h4>
                  <p class="light">
                    When you post a picture, you give your potential clients more confidence,
                    we mean, they have a good sensation looking a face instead a default picture,
                    don't you think? So, Start adding a picture. Make sure your face appears there.
                  </p>
                </div>
              </div>
            </div>

          </div>
        <!-- Change Profile Picture -->
      </div>
      <!--Edit-->

<!--
      <span>Profile Image
        <i class="material-icons tooltipped" data-position="bottom" data-delay="10" data-tooltip="This field is Private">lock_outline</i>
      </span>-->

    </div>
    <!-- Box-body -->
  </div>
  <!-- Box -->
</div>
</section>
@stop
