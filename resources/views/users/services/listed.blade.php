@extends('layouts.app')
@section('title', 'Services Listed')
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
      <li><a href="{{ url('/myoffices') }}" class="underline">Offices</a></li>
      <li class="active"><a href="{{ url('/myservices') }}">Services</a></li>
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
      <a href="{{ url('/myservices') }}"><li class="active"><i class="material-icons left">layers</i>Listed </li></a>
      <a href="{{ url('/myservices/notlisted') }}"><li><i class="material-icons left">layers_clear</i>Not Listed </li></a>
    </ul>
 </div>
</div>
<!-- Menu Left -->

<div class="container col s10">
  @if (count($services) == 0)
  <!-- Box Nothing -->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">receipt</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">You don't have any service, start one clicking bellow! </p>
      <a href="{{ url('create/services') }}" class="btn btn-new">Create Service</a>
    </div>
  </div>
  <!-- Box Nothing -->
  @else
  <div class="row">
    @foreach ($services as $service)
      <div class="col s9">
        <div class="listed">
            <div class="listed_body row">
                <!-- Img -->
                <div class="col s4">
                  <img class="materialboxed" src="{{ $service->thumbnail }}" alt="" />
                </div>

                <!-- Center -->
                <div class="col s5 listed_content row">
                    <div class="col s12">
                      <h6 class="truncate">{{ $service->title }}</h6>
                      <p><span class="location"><i class="material-icons">location_on</i>{{ $service->city }}, {{ $service->country }}</span></p>
                      <p><span class="category service">
                        {{ $service->type }},
                          @if( $service->capacity == '1')
                            {{ $service->capacity }} Person
                          @else
                           {{ $service->capacity }} People
                          @endif
                      </span></p>
                    </div>

                    <div class="col s12 listed_content_bottom row">
                      <div class="col s4 boxy tooltipped" data-position="bottom" data-delay="50" data-tooltip="Stars">
                          {{ $service->stars }} <i class="material-icons stars">star</i>
                      </div>

                      <div class="col s4 boxy tooltipped" data-position="bottom" data-delay="50" data-tooltip="Recommends">
                          {{ $service->recommends }} <i class="material-icons recommends">favorite</i>
                      </div>

                      <div class="col s4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Comments">
                          {{ $service->comments }} <i class="material-icons comments">forum</i>
                      </div>
                    </div>

                </div>

                <!-- Right-->
                <div class="col s3">
                  <div class="listed_price">
                    <div class="listed_price_content">
                        <h6>{{ $service->currency }}</h6>
                        <h5 class="truncate"><span>$</span>{{ $service->price }}</h5>
                        <p>Per {{ $service->per }}</p>
                        <a href="{{ route('service.router', ['hash' => $service->hash, 'route' => 'basics' ]) }}" class="btn">Edit</a><br>
                        <a href="{{ route('service.show', ['hash' => $service->hash ]) }}" class="link">Show</a> - <a href="#" class="link">Delete</a>
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
