@extends('layouts.auth')
@section('title', 'Reset Password')
@section('content')

<!-- Reset Password form -->
<form action="/password/reset" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="input-field">
      <input placeholder="E-mail" type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="input-field">
      <input placeholder="Password" type="password" name="password" required>
    </div>

    <div class="input-field">
      <input placeholder="Confirm Password" type="password" name="password_confirmation" required>
    </div>

    <div class="panel-submit">
    <button class="btn btn-submit">Change Password</button>
    </div>

    <div class="panel-options">
     <a href="{{ url('auth/login') }}">False Alarm <strong>Login now! </strong></a>
    </div>

</form>
@stop
