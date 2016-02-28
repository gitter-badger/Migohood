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

@stop
