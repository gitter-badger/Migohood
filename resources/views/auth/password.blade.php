@extends('layouts.auth')
@section('title', 'Forgot Password?')
@section('id', 'password')
@section('content')
<!-- Forgot Password form -->
<form action="/password/email" method="POST">
    {!! csrf_field() !!}

    <div class="input-field">
      <input placeholder="E-mail" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="panel-submit">
    <button class="btn btn-submit">Send Password Reset Link</button>
    </div>

    <div class="panel-options">
     <a href="{{ url('auth/login') }}">False Alarm <strong>Login now! </strong></a>
    </div>

</form>
@stop
