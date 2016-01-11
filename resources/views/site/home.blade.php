@extends('layouts.site')
@section('title', 'Rent and stay with hosts... or offer services around the World')
@section('content')

<!-- Content-->
<section id="home">

  <div id="box">
    <h1 class="light">Mine is yours!</h1>
    <p class="light">Rent and stay with hosts or offer your services around the world.</p>
    <p class="light">Discover places and services near you <strong>has never been so easy!</strong></p>

    <!-- Form -->
    <form class="row" action="" method="">

      <div class="col s10">
        <input placeholder="Start typing your city or country" type="text" name="" value="" required>
      </div>

      <div class="col s2">
        <button class="btn  waves-effect waves-light"><i class="material-icons">search</i></button>
      </div>

    </form>
    <!-- Form -->

    <div class="divider"></div>

    <span class="light">...or find out <a href="#" class="underline"><strong>How it works</strong></a></span>

  </div>


  <div class="footer">
    <img src="/img/back-foot01.png" alt=".." />
  </div>
</section>
<!-- Content-->

@stop
