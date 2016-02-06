@extends('layouts.app')
@section('title', 'Offices Listed')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li><a href="{{ url('/dashboard') }}" class="underline">Dashboard</a></li>
      <li><a href="{{ url('/inbox') }}" class="underline">Inbox</a></li>
      <li><a href="{{ url('/myspaces') }}" class="underline">Spaces</a></li>
      <li class="active"><a href="{{ url('/myoffices') }}">Offices</a></li>
      <li><a href="{{ url('/myservices') }}" class="underline">Services</a></li>
    </ul>

  </div>
</nav>
</div>
</div>
<!-- Content -->
<section class="body row">

<!-- Menu Left -->
<div class="col s2">
  <div class="menu container">
    <ul>
      <a href="{{ url('/myoffices') }}"><li class="active"><i class="material-icons left">layers</i>Listed </li></a>
      <a href="{{ url('/myoffices/notlisted') }}"><li><i class="material-icons left">layers_clear</i>Not Listed</li></a>
    </ul>
 </div>
</div>
<!-- Menu Left -->

<div class="container col s10">
  @if (count($offices) == 0)
  <!-- Box Nothing -->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">work</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">You don't have any space, start one clicking bellow! </p>
      <a href="{{ url('create/spaces') }}" class="btn btn-new">Create Space</a>
    </div>
  </div>
  <!-- Box Nothing -->
  @else
  <div class="row">
    @foreach ($offices as $office)
      <div class="col s9">
        <div class="listed">
            <div class="listed_body row">
                <!-- Img -->
                <div class="col s4">
                  <img class="materialboxed" src="{{ $office->thumbnail }}" alt="" />
                </div>

                <!-- Center -->
                <div class="col s5 listed_content row">
                    <div class="col s12">
                      <h6 class="truncate">{{ $office->title }}</h6>
                      <p><span class="location"><i class="material-icons">location_on</i>{{ $office->country }}, {{ $office->city}}</span></p>
                      <p><span class="category office">{{ $office->type }} -  {{ $office->accomodance }}</span></p>
                    </div>

                    <div class="col s12 listed_content_bottom row">
                      <div class="col s4 boxy tooltipped" data-position="bottom" data-delay="50" data-tooltip="Stars">
                          {{ $office->stars }} <i class="material-icons stars">star</i>
                      </div>

                      <div class="col s4 boxy tooltipped" data-position="bottom" data-delay="50" data-tooltip="Recommends">
                          {{ $office->recommends }} <i class="material-icons recommends">favorite</i>
                      </div>

                      <div class="col s4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Comments">
                          {{ $office->comments }} <i class="material-icons comments">forum</i>
                      </div>
                    </div>

                </div>

                <!-- Right-->
                <div class="col s3">
                  <div class="listed_price">
                    <div class="listed_price_content">
                        <h6>{{ $office->currency }}</h6>
                        <h5 class="truncate"><span>$</span>{{ $office->price }}</h5>
                        <p>Per {{ $office->per }}</p>
                        <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'basics' ]) }}" class="btn">Edit</a><br>
                        <a href="{{ route('office.show', ['hash' => $office->hash ]) }}" class="link">Show</a> - <a href="#" class="link">Delete</a>
                    </div>
                  </div>
                </div>

            </div>
        </div>


      </div>

     @endforeach
  </div>
  @endif
</div>
</section>

@stop
