@extends('layouts.auth')
@section('title', 'Iniciar Sesión')
@section('id', 'login')
@section('content')
<!-- Login form -->
<form action="/auth/login" method="POST">
    {!! csrf_field() !!}

    <div class="input-field">
      <input placeholder="Correo" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="input-field">
      <input placeholder="Contraseña" type="password" name="password">
    </div>

    <p class="center">
          <input type="checkbox" name="remember" id="check"/>
          <label for="check">No cerrar sesión</label>
    </p>

    <div class="panel-submit">
    <button class="btn btn-submit">Iniciar Sesión</button>
    </div>

    <div class="panel-forgot">
      <a href="{{ url('password/email') }}">Olvidé mi contraseña</a>
    </div>

    <div class="panel-options">
    <a href="{{ url('auth/register') }}">¿No tienes cuenta? <strong>Regístrate </strong></a>
    </div>

</form>
@stop
