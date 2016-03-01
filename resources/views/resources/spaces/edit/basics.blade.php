@extends('layouts.edit')
@section('title', 'Space - Basics')
@section('menu')
  @include('resources/spaces/edit.menu')
@stop

@section('content')

  hello from basic

  {{ $route }} ,

  {{ $resource->type }}
  {{ $resource->room }}

@stop

@section('info')
  <img src="/img/app/space.png" alt="" /><!-- Change it -->
  <h5 class="light">Almost Done!</h5>
  <p class="light">
     Describe your place as best you can. The better you describe your space, more guests you'll get.
  </p>
@stop
