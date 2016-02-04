@extends('layouts.app')
@section('title')
  @if ($office->public == 'no')
    Preview - {{ $office->type }}, {{ $office->accomodance }}
  @else
    Office - {{ $office->type }}, {{ $office->accomodance }}
    in {{ $office->city }}, {{ $office->country }}
  @endif

@stop
@section('content')

<!-- -->


<!-- -->

@stop
