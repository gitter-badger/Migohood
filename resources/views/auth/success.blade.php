@extends('layouts.auth')
@section('title', 'Password changed')
@section('id', 'password')
@section('content')
<!-- Success -->
 <div class="success-box">
   <div class="success-title">
     <i class="material-icons">check</i><strong>Yeah!</strong> It's done
   </div>
   <div class="alert-content">
     Your password has been reset! <br>
     Redirect to
     <strong><a href="{{ url('/explore') }}">Home</a></strong> or     
     <strong><a href="{{ url('/') }}">Main website </a></strong>
   </div>
 </div>
@stop
