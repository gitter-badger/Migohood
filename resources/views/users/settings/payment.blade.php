@extends('layouts.edit')
@section('title', 'Settings - Payment ')
@section('menu')
  <ul>
    <a href="{{ url('/settings/account') }}"><li><i class="material-icons left">account_circle</i>Account</li></a>
    <a href="{{ url('/settings/privacy') }}"><li><i class="material-icons left">lock</i>Privacy</li></a>
    <a href="{{ url('/settings/payment') }}"><li class="active"><i class="material-icons left">receipt</i>Payment</li></a>
  </ul>
@stop
@section('content')

<!-- Title -->
<div class="title">
   <h5>Payment</h5>
   <p class="light">About payment settings </p>
   <div class="divider"></div>
</div>

<!-- Uddate Space Thumbnail -->
<form class="form row" action="#"  method="POST" id="new_space">
    {{ csrf_field() }}



    <div class="next right">
      <button type="submit" class="btn btn-save">Save</button>
    </div>

  </form>


@stop

@section('info')
  <img src="" alt="" />
    <h4 class="light">Title about this section</h4>
    <p class="light">
    Some information goes here
    </p>
@stop
