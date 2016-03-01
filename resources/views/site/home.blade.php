@extends('layouts.site')
@section('title', 'A world of possibilities: Share with Others Around You')
@section('content')

<!-- Welcome -->
<section id="home">

  <!-- Box Search -->
  <div class="box-search">
    <h1 class="light">A World Of Possibilities!</h1>
    <p class="light first">Share with Others <strong>Around You</strong></p>

    <!-- Form -->
    <form class="row" action="#" method="GET" role="search">
      {{ csrf_field() }}
      <div class="col s12 m10 l10">
        <input placeholder="Where?" type="text" name="query_text" value="" required>
      </div>

      <div class="col s12 m2 l2">
        <button class="btn btn-search waves-effect waves-light"><i class="material-icons">search</i><span>Search</search></button>
      </div>

    </form>
    <!-- Form -->

    <div class="divider"></div>

    <p class="second light">Find out <a href="#" class="underline"><strong> How it works</strong></a></p>

    <div class="foot-img">
      <img src="/img/site/back-foot01.png" alt=".." />
    </div>

  </div>
  <!-- Box Search -->

</section>
<!-- Welcome -->

<!-- Why -->
<section class="row" id="why">
  <div class="container center">
    <div class="col s6 m3 l3">
      <img src="/img/site/web.png" alt="" />
      <h5 class="web">Register </h5>
      <p class="second">
        Become a Migo and start sharing and serving what’s yours with the World.
      </p>
    </div>

    <div class="col s6 m3 l3">
      <img src="/img/site/new.png" alt="" />
      <h5 class="new">Post a Listing </h5>
      <p class="second">
        List your spaces, workspaces, parking and any service you can provide
      </p>
    </div>

    <div class="col s6 m3 l3">
      <img src="/img/site/search.png" alt="" />
      <h5 class="search"> Discover Places &amp; Services</h5>
      <p class="second">
        Find hosts with unique spaces, workspaces, and services like never before.
      </p>
    </div>

    <div class="col s6 m3 l3 ">
      <img src="/img/site/pay.png" alt="" />
      <h5 class="pay"> Make &amp; Save Money </h5>
    </div>
    <p class="second">
      Get paid when you host, cutback your expenses while you travel, and start saving money
    </p>

  </div>

</section>
<!-- Why -->




@stop
