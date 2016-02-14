@extends('layouts.edit')
@section('title', 'Create Services')
@section('content')
  <!-- Title -->
  <div class="title">
     <h5>Give more details</h5>
     <p  class="light">People can filter by listing basics to find a Service they like. </p>
     <div class="divider"></div>
  </div>

  @include('forms.newService')

@stop

@section('info')
  <img src="/img/app/space.png" alt="" />
    <h4 class="light">Let's do it</h4>
    <p class="light">
      To create a new Service is too easy. Please proceed to next steps
      to have it available for rent.
    </p>
@stop
