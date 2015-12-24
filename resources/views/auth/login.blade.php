@extends('layouts.auth')
@section('title', 'Login')
@section('id', 'login')
@section('content')
<!-- Registration form -->
<form action="/auth/register" method="POST">
    {!! csrf_field() !!}

    <div class="input-field">
      <input placeholder="Correo" type="email" name="email" value="{{ old('email') }}" class="validate">
    </div>

    <div class="input-field">
      <input placeholder="Contraseña" type="password" name="password" class="validate">
    </div>

    <p class="center">
          <input type="checkbox" name="remember" id="check"/>
          <label for="check">No cerrar sesión</label>
    </p>

    <div class="panel-submit">
    <button class="btn btn-submit">Iniciar Sesión</button>
    </div>

</form>
@stop
