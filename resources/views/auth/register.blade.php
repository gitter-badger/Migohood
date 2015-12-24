@extends('layouts.auth')
@section('title', 'Registrar')
@section('id', 'register')
@section('content')
<!-- Registration form -->
<form action="/auth/register" method="POST">
    {!! csrf_field() !!}

    <div class="input-field">
      <input placeholder="Nombre" type="text" name="name" value="{{ old('name') }}">
    </div>

    <div class="input-field">
      <input placeholder="Apellido" type="text" name="lastname" value="{{ old('lastname') }}">
    </div>

    <div class="input-field">
      <input placeholder="Correo" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="input-field">
      <input placeholder="Contraseña" type="password" name="password">
    </div>

    <div class="input-field">
      <input placeholder="Repetir Contraseña" type="password" name="password_confirmation">
    </div>

    <div class="panel-submit">
    <button class="btn btn-submit">Registrarme</button>
    </div>

    <div class="panel-options">
    <span>¿Tienes cuenta? </span><a href="{{ url('auth/login') }}"><strong>Inicia Sesión </strong></a>
    </div>

</form>
@stop
