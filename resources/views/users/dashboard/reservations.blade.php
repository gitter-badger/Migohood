@extends('layouts.app')
@section('title', 'Dashboard - Reservations')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li class="active"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
      <li><a href="{{ url('/inbox') }}" class="underline">Inbox</a></li>
      <li><a href="{{ url('/myspaces') }}" class="underline">Spaces</a></li>
      <li><a href="{{ url('/myoffices') }}" class="underline">Offices</a></li>
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
      <a href="{{ url('/dashboard') }}"><li><i class="material-icons left">developer_board</i>Dashboard</li></a>
      <a href="{{ url('/dashboard/reservations') }}"><li class="active"><i class="material-icons left">date_range</i>Reservations </li></a>
      <a href="{{ url('/dashboard/my_rents') }}"><li><i class="material-icons left">event_note</i>My Rents </li></a>
      <a href="{{ url('/dashboard/pending_approval') }}"><li><i class="material-icons left">event_available</i>Pending Approval </li></a>
      <a href="{{ url('/dashboard/pending_payment') }}"><li><i class="material-icons left">event</i>Pending Payment </li></a>
      <a href="{{ url('/dashboard/transactions') }}"><li><i class="material-icons left">history</i>Transactions </li></a>
    </ul>
 </div>
</div>
<!-- Menu Left -->

  <div class="container col s10">

  @if (count($reservations) == 0)
  <!-- Box Nothing -->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">date_range</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">You don't have any reservation</p>
    </div>
  </div>
  <!-- Box Nothing -->
  @else

    <ul class="col s6 collection">
      @foreach($reservations as $reservation)
      <li class="collection-item avatar">

        <img src="{{ App\User::where('id', $reservation->who_requests)->first()->avatar }}" alt="" class="circle">
        <!-- Title -->
        <span class="title">
          <!-- Name -->
          Accepted a <strong> {{ App\User::where('id', $reservation->who_requests)->first()->name }}</strong>'s request for rent your

            <!-- Type -->
            @if ($reservation->announce_type == 'space')
              <a href="{{ route('space.show', ['hash' => $reservation->announce_hash ]) }}"> Space </a>
            @endif

        </span>

        <!-- When? -->
        <p class="second">
          <i class="material-icons">flight_land</i>
            Arrives on <strong>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->when_stars)->format('m/d/Y') }}</strong>
            and Take off on <strong>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->when_ends)->format('m/d/Y') }}</strong>
        </p>

        <!-- Come with -->
        <p class="second">
          <i class="material-icons">people</i>
          for  @if($reservation->capacity == 1 )
                  <strong>{{ $reservation->capacity }} Guest </strong>
               @else
                  <strong>{{ $reservation->capacity }} Guests </strong>
               @endif
        </p>


      </li>

      @endforeach
    </ul>

    <div class="center">
      {!! $reservations->render() !!}
    </div>

  @endif

    </div>

</section>

@stop
