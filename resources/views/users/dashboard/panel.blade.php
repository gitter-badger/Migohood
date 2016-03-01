@extends('layouts.app_extended')
@section('title', 'Dashboard')
@section('menu')
    @include('users/dashboard.menu')
@stop

@section('content')

<!-- Box Nothing -->
<div class="box">
  <div class="box-nothing">
    <i class="material-icons">developer_board</i>
    <h5 class="light">Woops! It looks lonely here. </h5>
    <p class="light">You don't have any activity in your Panel</p>
  </div>
</div>
<!-- Box Nothing -->

@stop
