@extends('layouts.auth')
@section('title', 'Resetear Contraseña')
@section('id', 'password')
@section('content')
<!-- Reset Password form -->
<form action="/password/email" method="POST">
    {!! csrf_field() !!}

    <div class="input-field">
      <input placeholder="Correo" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="panel-submit">
    <button class="btn btn-submit">Enviar Link</button>
    </div>

    <div class="panel-options">
    <a href="{{ url('auth/login') }}">Falsa Alarma <strong>Iniciar Sesión </strong></a>
    </div>

</form>
@stop
