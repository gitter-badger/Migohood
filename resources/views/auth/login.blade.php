@extends('layouts.auth')
@section('title', 'Login')
@section('id', 'login')
@section('content')
<!-- Login form -->
<form action="/auth/login" method="POST">
    {!! csrf_field() !!}

    <div class="input-field">
      <input placeholder="E-mail" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="input-field">
      <input placeholder="Password" type="password" name="password">
    </div>

    <p class="center">
          <input type="checkbox" name="remember" id="check"/>
          <label for="check">Keep me logged</label>
    </p>

    <div class="panel-submit">
    <button class="btn btn-submit">Login</button>
    </div>

    <div class="panel-options">
      <a href="{{ url('auth/register') }}">Not a member? <strong>Sign up now! </strong></a>
    </div>

    <div class="panel-options">
      <a href="{{ url('password/email') }}">Forgot your password?</a>
    </div>

</form>
@stop
