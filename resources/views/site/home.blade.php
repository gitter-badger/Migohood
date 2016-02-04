@extends('layouts.site')
@section('title', 'Rent from and stay with hosts... or offer services around the World')
@section('content')

<!-- Welcome -->
<section id="home">
  <div id="box">
    <h1 class="light">Mine is yours!</h1>
    <p class="light first">Rent from and stay with hosts or offer your services around the world.</p>
    <p class="light">Discovering places, offices and services near you <strong>has never been so easy!</strong></p>

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

<!-- Why -->
<section class="row" id="why">
  <div class="container">
    <div class="col s3">
      <img src="/img/site/web.png" alt="" />
      <h5 class="web">Register or Sign in </h5>
      <p class="second">
        Get register or login to starting a new announce
        is very quick, you need no tricks.
      </p>
    </div>

    <div class="col s3">
      <img src="/img/site/new.png" alt="" />
      <h5 class="new">Public an announce </h5>
      <p class="second">
        Simply choose between Spaces, Offices or Services,
        and public your announce in a feew
      </p>
    </div>

    <div class="col s3">
      <img src="/img/site/search.png" alt="" />
      <h5 class="search"> ..or Search for it </h5>
      <p class="second">
        Perhaps you are interested in a place to stay on this summer,
        try searching and renting it.
      </p>
    </div>

    <div class="col s3">
      <img src="/img/site/pay.png" alt="" />
      <h5 class="pay"> Get paid or pay </h5>
    </div>
    <p class="second">
      If you are an announcer, you'll get paid when you confirme
      your client arrive. And all transactions are cover.
    </p>
  </div>
  <!--<h5 class="light">What are you wating for?</h5>
  <p class="second">Thousand of people are on Migohood. Wait no more, Join Migohood today!</p>-->

</section>
<!-- Why -->

<section class="container row" id="boxes">

  <div class="col s4">
    <div class="box">
      <div class="box-body">
          <img src="/img/site/pic1.png" alt="" />

          <div class="box-content center">
            <h6>Beauty Builing on rent!</h6>
            <span class="light">Cartagena, Colombia</span><br>
            <span>All Space / Private Room </span>
          </div>

          <div class="divider"></div>

          <div class="box-footer row">
            <div class="col s4 star">
              4 <i class="material-icons">star</i>
            </div>

            <div class="col s4 hearth">
              5 <i class="material-icons">favorite</i>
            </div>

            <div class="col s4 comments">
              8 <i class="material-icons">question_answer</i>
            </div>

          </div>


      </div>
    </div>
  </div>

  <div class="col s4">
    <div class="box">
      <div class="box-body">
          <img src="/img/site/pic2.jpg" alt="" />

          <div class="box-content center">
            <h6>Famly House Available </h6>
            <span class="light">New York, Usa</span><br>
            <span>All Space / Shared Room </span>
          </div>

          <div class="divider"></div>

          <div class="box-footer row">
            <div class="col s4 star">
              5 <i class="material-icons">star</i>
            </div>

            <div class="col s4 hearth">
              17 <i class="material-icons">favorite</i>
            </div>

            <div class="col s4 comments">
              5 <i class="material-icons">question_answer</i>
            </div>

          </div>


      </div>
    </div>
  </div>

  <div class="col s4">
    <div class="box">
      <div class="box-body">
          <img src="/img/site/pic3.jpg" alt="" />

          <div class="box-content center">
            <h6>Amazing Bike Rental Service</h6>
            <span class="light">Miami, Usa</span><br>
            <span>Others / Rents </span>
          </div>

          <div class="divider"></div>

          <div class="box-footer row">
            <div class="col s4 star">
              5 <i class="material-icons">star</i>
            </div>

            <div class="col s4 hearth">
              8 <i class="material-icons">favorite</i>
            </div>

            <div class="col s4 comments">
              3 <i class="material-icons">question_answer</i>
            </div>

          </div>


      </div>
    </div>
  </div>

  <div class="col s4">
    <div class="box">
      <div class="box-body">
          <img src="/img/site/pic4.jpg" alt="" />

          <div class="box-content center">
            <h6> Shared Offices</h6>
            <span class="light">California, Usa</span><br>
            <span>All Space / Bristro Café </span>
          </div>

          <div class="divider"></div>

          <div class="box-footer row">
            <div class="col s4 star">
              3 <i class="material-icons">star</i>
            </div>

            <div class="col s4 hearth">
              3 <i class="material-icons">favorite</i>
            </div>

            <div class="col s4 comments">
              3 <i class="material-icons">question_answer</i>
            </div>

          </div>


      </div>
    </div>
  </div>

  <div class="col s4">
    <div class="box">
      <div class="box-body">
          <img src="/img/site/pic5.jpg" alt="" />

          <div class="box-content center">
            <h6>Beach confortable cabain</h6>
            <span class="light">Miami, Usa</span><br>
            <span>All Space / Private Room </span>
          </div>

          <div class="divider"></div>

          <div class="box-footer row">
            <div class="col s4 star">
              10 <i class="material-icons">star</i>
            </div>

            <div class="col s4 hearth">
              4 <i class="material-icons">favorite</i>
            </div>

            <div class="col s4 comments">
              9 <i class="material-icons">question_answer</i>
            </div>

          </div>


      </div>
    </div>
  </div>

  <div class="col s4">
    <div class="box">
      <div class="box-body">
          <img src="/img/site/pic6.jpg" alt="" />

          <div class="box-content center">
            <h6>Caraban on Rent, Live Young!</h6>
            <span class="light">California, Usa</span><br>
            <span>All Space / Private </span>
          </div>

          <div class="divider"></div>

          <div class="box-footer row">
            <div class="col s4 star">
              3 <i class="material-icons">star</i>
            </div>

            <div class="col s4 hearth">
              3 <i class="material-icons">favorite</i>
            </div>

            <div class="col s4 comments">
              3 <i class="material-icons">question_answer</i>
            </div>

          </div>


      </div>
    </div>
  </div>



</section>
<!--
<section class="container" id="info">

  <div class="col s4 img">
    <img src="/img/site/couple.png" alt="" />
  </div>
</section>

<div class="container divider"></div>-->

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
