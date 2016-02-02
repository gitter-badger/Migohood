@extends('layouts.auth')
@section('title', 'Register')
@section('id', 'register')
@section('content')
<!-- Registration form -->
<form action="/auth/register" method="POST">
    {!! csrf_field() !!}

    <div class="input-field">
      <input placeholder="Fullname" type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="input-field">
      <input placeholder="E-mail" type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="input-field">
      <input placeholder="Password" type="password" name="password" required>
    </div>

    <div class="input-field" style="display: none; ">
      <input name="avatar" value="/img/app/default.jpg">
    </div>

    <div class="input-field">
      <input placeholder="Confirm Password" type="password" name="password_confirmation" required>
    </div>

    <p class="center">
      <input type="checkbox" name="agree" id="check" checked/>
      <label for="check">I'm agree with <a href="#">Terms and conditions</a></label>
    </p>

    <div class="panel-submit">
    <button class="btn btn-submit">Sign up</button>
    </div>

    <div class="container divider"></div>
    <div class="panel-social">
      <a href="{{ url('auth/facebook') }}" class="btn btn-facebook">Sign up with <span>Facebook</span></a>
    </div>

    <div class="panel-social">
      <a href="{{ url('') }}" class="btn btn-google">Sign up with <span>Google</span></a>
    </div>

    <div class="panel-options">
     <a href="{{ url('auth/login') }}">Are you a member? <strong>Login now! </strong></a>
    </div>

</form>
@stop
