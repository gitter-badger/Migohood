@extends('layouts.app')
@section('title')
  @if ($space->public == 'no')
    Preview - {{ $space->type }}, {{ $space->accomodance }}
  @else
    Space - {{ $space->type }}, {{ $space->accomodance }}
    in {{ $space->city }}, {{ $space->country }}
  @endif

@stop
@section('content')
  <section class="row space">

      <div class="col s4">
        <img class="materialboxed" src="{{ $space->thumbnail }}" alt="" />
      </div>

      <div class="col s8">
          a
      </div>
      -- Show --
      <ul>
        <li>Type - {{ $space->type }} </li>
        <li>Type - {{ $space->accomodance }} </li>
        <li>capacity - {{ $space->capacity }} </li>
      </ul>

      @if(Auth::user()->id  == $space->user_id)
        <a href=" {{ route('space.basics', ['hash' => $space->hash ]) }}">Edit</a>
      @else
        <a href=" #">reserve</a>
     @endif

  </section>
<!-- -->

@stop
