@extends('layouts.app')
@section('title', 'Inbox Sent')
@section('content')
<!-- Options NavBar -->
<div id="options">
<div class="navbar-fixed">
<nav role="navigation">
  <div class="nav-wrapper">

    <ul class="left">
      <li><a href="{{ url('/dashboard') }}" class="underline">Dashboard</a></li>
      <li class="active"><a href="{{ url('/inbox') }}">Inbox</a></li>
      <li><a href="{{ url('/myspaces') }}" class="underline">Spaces</a></li>
      <li><a href="{{ url('/myoffices') }}" class="underlin">Offices</a></li>
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
      <a href="{{ url('/inbox') }}"><li><i class="material-icons left">mail</i>Received</li></a>
      <a href="{{ url('/inbox/sent') }}"><li class="active"><i class="material-icons left">send</i>Sent </li></a>
      <a href="{{ url('/inbox/archived') }}"><li><i class="material-icons left">drafts</i>Archived</li></a>
    </ul>
 </div>
</div>
<!-- Menu Left -->

<div class="container col s10">


  <!-- Box Nothing -->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">contact_mail</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">You don't have any message sent </p>
    </div>
  </div>
  <!-- Box Nothing -->

  </div>

</section>

@stop
