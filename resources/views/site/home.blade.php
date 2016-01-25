@extends('layouts.site')
@section('title', 'Rent from and stay with hosts... or offer services around the World')
@section('content')

<!-- Welcome -->
<section id="home">
  <div id="box">
    <h1 class="light">Mine is yours!</h1>
    <p class="light first">Rent from and stay with hosts or offer your services around the world.</p>
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

  <div class="footer center">
    <img src="/img/site/back-foot01.png" alt=".." />
  </div>
</section>
<!-- Welcome -->

<section class="container" id="info">
  <!-- Img -->
  <div class="col s4 img">
    <img src="/img/site/couple.png" alt="" />
  </div>
</section>

<div class="container divider"></div>

<!-- Second -->
<!--
<section class="center" id="intro">

  <h4>Earn money announcing what is your!</h4>
  <p class="second"><span>Migohood</span> is the best option to rent, stay, offer and enjoy everything around the globe</p>
  <p class="tird">Travel or host people, rent spaces to travelers or offer your services, and what is better: <strong>make money in the process.</strong></p>

  <button class="btn waves-effect waves-dark">Explore now</button>
</section>-->
<!-- Second -->
@stop
