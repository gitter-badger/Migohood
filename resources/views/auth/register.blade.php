@extends('layouts.auth')
@section('title', 'Register')
@section('content')
<!-- Registration form -->
<form action="/auth/register" method="POST">
    {!! csrf_field() !!}

    <div class="input-field">
      <input placeholder="Nombre" type="text" name="name" value="{{ old('name') }}"  class="validate">
    </div>

    <div class="input-field">
      <input placeholder="Apellido" type="text" name="lastname" value="{{ old('lastname') }}" class="validate">
    </div>

    <div class="input-field">
      <input placeholder="Correo" type="email" name="email" value="{{ old('email') }}" class="validate">
    </div>

    <div class="input-field">
      <input placeholder="Contraseña" type="password" name="password" class="validate">
    </div>

    <div class="input-field">
      <input placeholder="Repetir Contraseña" type="password" name="password_confirmation" class="validate">
    </div>
    
    <div class="panel-submit">
    <button class="btn btn-submit">Registrarme</button>
    </div>

</form>
@stop
