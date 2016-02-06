@extends('layouts.app')
@section('title')
    Space - {{ $space->type }}, {{ $space->accomodance }}
    in {{ $space->city }}, {{ $space->country }}
@stop
@section('content')
<section class="row">

    -- Show --
    <ul>
      <li>Type - {{ $space->type }} </li>
      <li>Type - {{ $space->accomodance }} </li>
      <li>capacity - {{ $space->capacity }} </li>
    </ul>

    @if(Auth::user()->id  == $space->user_id)
      <a href=" {{ route('space.router', ['hash' => $space->hash, 'route' => 'basics' ]) }}">Edit</a>
    @else
      <a href=" #">reserve</a>
   @endif

</section>
@stop
