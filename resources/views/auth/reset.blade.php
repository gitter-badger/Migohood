@extends('layouts.auth')
@section('title', 'Cambiar Contraseña')
@section('id', 'password')
@section('content')
<!-- Login form -->
<form action="/password/reset" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="input-field">
      <input placeholder="Correo" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="input-field">
      <input placeholder="Contraseña" type="password" name="password">
    </div>

    <div class="input-field">
      <input placeholder="Confirmar Contraseña" type="password" name="password_confirmation">
    </div>

    <div class="panel-submit">
    <button class="btn btn-submit">Cambiar contraseña</button>
    </div>

    <div class="panel-options">
    <a href="{{ url('auth/login') }}">Falsa Alarma <strong>Iniciar Sesión </strong></a>
    </div>

</form>
@stop
