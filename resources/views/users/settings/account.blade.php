@extends('layouts.edit')
@section('title', 'Settings - Account ')
@section('menu')
  <ul>
    <a href="{{ url('/settings/account') }}"><li class="active"><i class="material-icons left">account_circle</i>Account</li></a>
    <a href="{{ url('/settings/privacy') }}"><li><i class="material-icons left">lock</i>Privacy</li></a>
    <a href="{{ url('/settings/payment') }}"><li><i class="material-icons left">receipt</i>Payment</li></a>
  </ul>
@stop
@section('content')

<!-- Title -->
<div class="title">
   <h5>Avatar</h5>
   <p class="light">Everyone love view photos. Start with an avatar.
   This is almost the most important, is the first reference that hoster will have about you. </p>
   <div class="divider"></div>
</div>

<!-- Uddate Space Thumbnail -->
<form class="form row" id="pic" action="{{ route('account.avatar.update', ['id', $user->id ]) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="avatar center col s6">
      <img src="{{ $user->avatar }}" alt="" />
    </div>

    <div class="col s6 file-field input-field">
     <div class="btn btn-update">
       <span>Update</span>
       <input type="file" name="file">
     </div>
     <div class="file-path-wrapper">
       <input class="file-path validate" type="text">
     </div>
   </div>

   <div class="col s5 submit">
      <input type="submit" class="btn btn-submit" value="Save"/>
   </div>

</form>
<!-- Uddate Space Thumbnail -->


  <!-- Title -->
  <div class="title">
     <h5>Personal Information</h5>
     <p  class="light">Some description goes here. </p>
     <div class="divider"></div>
  </div>

  <form class="form row" action="{{ route('account.update', ['id', $user->id ]) }}"  method="POST" id="new_space">
    {{ csrf_field() }}

    <!-- Name -->
    <div class="input-field col s6">
      <input Placeholder="Type your name" id="name" type="text" name="name" required @if($user->name != 'null') value="{{ $user->name }}" @endif>
      <label class="active" for="name">Name</label>
    </div>
    <!-- Name -->

    <!-- LastName -->
    <div class="input-field col s6">
      <input Placeholder="Type your lastname" id="lastname" type="text" name="lastname" required @if($user->lastname != 'null') value="{{ $user->lastname }}" @endif>
      <label class="active" for="lastname">Lastname</label>
    </div>
    <!-- LastName -->

    <!-- Email -->
    <div class="input-field col s12">
      <input Placeholder="Type your email" id="email" type="text" name="email" required @if($user->email != 'null') value="{{ $user->email }}" @endif>
      <label class="active" for="email">Email</label>
    </div>
    <!-- Email -->

    <!-- Celphone -->
    <div class="input-field col s6">
      <input Placeholder="Type your cellphone" id="cellphone" type="text" name="cellphone" required @if($user->cellphone != 'null') value="{{ $user->cellphone }}" @endif>
      <label class="active" for="cellphone">Cellphone</label>
    </div>
    <!-- Celphone -->

    <!-- Homephone -->
    <div class="input-field col s6">
      <input Placeholder="Type your homephone" id="homephone" type="text" name="homephone" required @if($user->homephone != 'null') value="{{ $user->homephone }}" @endif>
      <label class="active" for="homephone">Home phone</label>
    </div>
    <!-- Homephone -->

    <!-- Country -->
    <div class="input-field col s6">
      <select name="country" required>
        <option value="" disabled selected>Choose one</option>
          @foreach($countries as $country)
            <option value="{{ $country->name }}" @if($user->country == $country->name ) selected='selected' @endif> {{ $country->name }} </option>
          @endforeach
      </select>
      <label>Country</label>
    </div>
    <!-- Country -->

    <!-- City -->
    <div class="input-field col s6">
      <input Placeholder="Type your city" id="city" type="text" name="city" required @if($user->city != 'null') value="{{ $user->city }}" @endif>
      <label class="active" for="city">City</label>
    </div>
    <!-- City -->

    <!-- Address -->
    <div class="input-field col s6">
      <input Placeholder="Type your address" id="address" type="text" name="address" required @if($user->address != 'null') value="{{ $user->address }}" @endif>
      <label class="active" for="address">Address</label>
    </div>
    <!-- Address -->

    <!-- zip -->
    <div class="input-field col s6">
      <input Placeholder="Type ZIP" id="zip" type="text" name="zip" @if($user->zip != 'null') value="{{ $user->zip }}" @endif>
      <label class="active" for="zip">ZIP (optional)</label>
    </div>
    <!-- zip -->

    <!-- Loction  -->
    <div class="input-field col s12">
      <input Placeholder="Type references about your location" id="location" type="text" name="location_references" required @if($user->location_references != 'null') value="{{ $user->location_references }}" @endif>
      <label class="active" for="location">Location References </label>
    </div>
    <!-- Location -->

    <div class="next right">
      <button type="submit" class="btn btn-save">Save</button>
    </div>

  </form>


@stop

@section('info')
  <img src="" alt="" />
    <h4 class="light">Title about this section</h4>
    <p class="light">
    Some information goes here
    </p>
@stop
