@extends('layouts.help')
@section('title', 'Terms and Conditions')
@section('first', 'Terms and Conditions')
@section('second', 'About our Legal Terms and Privacy Pocy')
@section('content')
<div class="box">
  <div class="right">
    <a href="{{ url('/terms') }}" class="active">EN</a>
    <a href="{{ url('/terms_es') }}">ES</a>
  </div>
  <div class="box-body">

  </div>
</div>



@stop
