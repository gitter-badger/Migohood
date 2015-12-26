@extends('layouts.auth')
@section('title', 'Register')
@section('id', 'register')
@section('content')
<!-- Registration form -->
<form action="/auth/register" method="POST">
    {!! csrf_field() !!}

    <div class="input-field">
      <input placeholder="Name" type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="input-field">
      <input placeholder="Last-name" type="text" name="lastname" value="{{ old('lastname') }}" required>
    </div>

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
    <button class="btn btn-submit">Sign up</button>
    </div>

    <div class="panel-options">
     <a href="{{ url('auth/login') }}">Are you a member? <strong>Login now! </strong></a>
    </div>

</form>
@stop
