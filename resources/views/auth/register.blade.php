@extends('layouts.auth')
@section('title', 'Register')
@section('content')
<!-- Registration form -->
<form action="/auth/register" method="POST">
    {!! csrf_field() !!}

    <div class="input-field">
      <input placeholder="Name" type="text" name="name" value="{{ old('name') }}" required>
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

    <p class="input-field">
      <input type="checkbox" name="agree" id="check"/>
      <label for="check">I agree with <a href="#">Terms and conditions, Privacy Policy</a> and <a href="#">Guest and Refund Policy</a></label>
    </p>

    <div class="panel-submit">
    <button class="btn btn-submit">Sign up</button>
    </div>

    <div class="container divider"></div>
    <div class="panel-social">
      <a href="{{ route('social.auth', ['provider' => 'facebook']) }}" class="btn btn-facebook">Sign up with <span>Facebook</span></a>
    </div>

    <div class="panel-social">
      <a href="{{ route('social.auth', ['provider' => 'google']) }}" class="btn btn-google">Sign up with <span>Google</span></a>
    </div>

    <div class="panel-options">
     <a href="{{ url('auth/login') }}">Are you a member? <strong>Login now! </strong></a>
    </div>

</form><br>
@stop
