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
<section class="settings">
<div class="container col s12">
  <div class="box">

    <!-- Basic Information -->
    <div class="box-body">
      <div class="box-title">
        <i class="material-icons">person_pin</i>Basic Information
      </div>

      <!--Edit-->
      <div class="row" id="edit">

        @include('alerts.update_profile_pic')

        <!-- Change Profile Picture -->
          <div class="col s3 left">
            <span>Profile Picture</span>
          </div>

          <div class="col s9 row right">

            <div class="col s2">
             <img class="materialboxed" src =" {{ url(Auth::user()->path) }} " alt="..."/>
            </div>

            <div class="col s5">
              <!-- Change picture Form-->
              <form method="post" action="{{ url('avatar/update')}}" enctype="multipart/form-data">
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
              <!-- Change picture -->
            </div>

            <div class="col s5 info">
              <!-- Here goes a message -->
            </div>

          </div>

      </div>
      <!--Edit-->

<!--
      <span>Profile Image
        <i class="material-icons tooltipped" data-position="bottom" data-delay="10" data-tooltip="This field is Private">lock_outline</i>
      </span>-->



    </div>


  </div>

</div>
</section>

@stop
