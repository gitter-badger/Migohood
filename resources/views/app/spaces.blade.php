@extends('layouts.app')
@section('title', 'Spaces')
@section('content')
<br>
<section class="row">
  <div class="col s3" id="search_box">
    <!-- Country -->
    <div class="input-field">
      <input Placeholder="What's your country?" id="country" type="text" name="country" required>
      <label class="active" for="country">Type a city or country</label>
    </div>
    <!-- Country -->
  </div>

  <div class="col s9">
    <div class="myplaces">

        <!-- Place -->
        <div class="place-box row">

          <!-- Left -->
          <div class="col s3 img">
            <img src="/img/site/pic1.png" alt="" />
            <div class="change">

            </div>
          </div>
          <!-- Left -->

          <!-- Center -->
          <div class="col s6 row">
            <!-- Top -->
            <div class="col s12 top">
                <h6 class="truncate first">Cartagena, Colombia </h6>
                <h6 class="truncate light second"> Building on rent</h6>
                <h6 class="third"><span> Other - All Space</span></h6>
            </div>
            <!-- Top -->

            <!-- Middle -->
            <div class="col s12 middle">
              <p class="truncate light">Amazing Builing of Apartments available</p>
            </div>
            <!-- Middle -->

            <!-- Bottom -->
            <div class="col s12 bottom row">

              <div class="col s3 boxy row">
                16+
                <i class="material-icons">group_add</i>
              </div>

              <div class="col s3 boxy">
                12
                 <i class="material-icons">store_mall_directory</i>
              </div>

              <div class="col s3 boxy">
                10
                <i class="material-icons">hotel</i>
              </div>

              <div class="col s3 boxy last">
                3
                <i class="material-icons">hot_tub</i>
              </div>

              <div class="col s3 tag row">
                Capacity
              </div>

              <div class="col s3 tag row">
                Bedrooms
              </div>

              <div class="col s3 tag row">
                Beds
              </div>

              <div class="col s3 tag row">
                Bathrooms
              </div>


            </div>
            <!-- Bottom -->

          </div>
          <!-- Center -->

          <!-- Right -->
          <div class="col s3 price">
            <div class="price-body">
              <h5 class="truncate light">$ 22.00</h5>
              <p class="second">USD</p>
              <p class="third light">per night</p>
            </div>
            <a href="#" class="btn">Reserve</a>
          </div>
          <!-- Right -->
      </div>


      <!-- Place -->
      <div class="place-box row">

        <!-- Left -->
        <div class="col s3 img">
          <img src="/img/site/pic2.jpg" alt="" />
          <div class="change">

          </div>
        </div>
        <!-- Left -->

        <!-- Center -->
        <div class="col s6 row">
          <!-- Top -->
          <div class="col s12 top">
              <h6 class="truncate first">Miami, USA </h6>
              <h6 class="truncate light second"> Family house on rent </h6>
              <h6 class="third"><span> House - All Space</span></h6>
          </div>
          <!-- Top -->

          <!-- Middle -->
          <div class="col s12 middle">
            <p class="truncate light">Family house is on rent, pets allowed! :D</p>
          </div>
          <!-- Middle -->

          <!-- Bottom -->
          <div class="col s12 bottom row">

            <div class="col s3 boxy row">
              10+
              <i class="material-icons">group_add</i>
            </div>

            <div class="col s3 boxy">
              3
               <i class="material-icons">store_mall_directory</i>
            </div>

            <div class="col s3 boxy">
              2
              <i class="material-icons">hotel</i>
            </div>

            <div class="col s3 boxy last">
              2
              <i class="material-icons">hot_tub</i>
            </div>

            <div class="col s3 tag row">
              Capacity
            </div>

            <div class="col s3 tag row">
              Bedrooms
            </div>

            <div class="col s3 tag row">
              Beds
            </div>

            <div class="col s3 tag row">
              Bathrooms
            </div>


          </div>
          <!-- Bottom -->

        </div>
        <!-- Center -->

        <!-- Right -->
        <div class="col s3 price">
          <div class="price-body">
            <h5 class="truncate light">$ 23.000</h5>
            <p class="second">COP</p>
            <p class="third light">per hour</p>
          </div>
          <a href="#" class="btn">Reserve</a>
        </div>
        <!-- Right -->
    </div>


    <!-- Place -->
    <div class="place-box row">

      <!-- Left -->
      <div class="col s3 img">
        <img src="/img/site/pic5.jpg" alt="" />
        <div class="change">

        </div>
      </div>
      <!-- Left -->

      <!-- Center -->
      <div class="col s6 row">
        <!-- Top -->
        <div class="col s12 top">
            <h6 class="truncate first">Cartagena, Colombia </h6>
            <h6 class="truncate light second"> Cabain in front of the beach </h6>
            <h6 class="third"><span> Cabain - Private Room s</span></h6>
        </div>
        <!-- Top -->

        <!-- Middle -->
        <div class="col s12 middle">
          <p class="truncate light">The best beach of all and the best cabain</p>
        </div>
        <!-- Middle -->

        <!-- Bottom -->
        <div class="col s12 bottom row">

          <div class="col s3 boxy row">
            5+
            <i class="material-icons">group_add</i>
          </div>

          <div class="col s3 boxy">
            5
             <i class="material-icons">store_mall_directory</i>
          </div>

          <div class="col s3 boxy">
            5
            <i class="material-icons">hotel</i>
          </div>

          <div class="col s3 boxy last">
            5
            <i class="material-icons">hot_tub</i>
          </div>

          <div class="col s3 tag row">
            Capacity
          </div>

          <div class="col s3 tag row">
            Bedrooms
          </div>

          <div class="col s3 tag row">
            Beds
          </div>

          <div class="col s3 tag row">
            Bathrooms
          </div>


        </div>
        <!-- Bottom -->

      </div>
      <!-- Center -->

      <!-- Right -->
      <div class="col s3 price">
        <div class="price-body">
          <h5 class="truncate light">$ 50.000</h5>
          <p class="second">COP</p>
          <p class="third light">per night</p>
        </div>
        <a href="#" class="btn">Reserve</a>
      </div>
      <!-- Right -->
  </div>





    </div>




</div>






    <!-- My places -->
  </div>
</section>

@stop
