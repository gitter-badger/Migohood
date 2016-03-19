@extends('layouts.app')
@section('title', 'Spaces')
@section('header')
  <script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>   <!-- Google Maps core JS -->
  <script src="/js/gmaps.min.js" type="text/javascript"></script>                     <!-- Gmaps core JS -->
  <link href="/css/maps.css" rel="stylesheet">                                        <!-- Maps Style core CSS -->
  <script src="/js/jquery.min.js" type="text/javascript"></script>                    <!-- Jquery core JS -->
  <script src="/js/space_map.js" type="text/javascript"></script>                     <!-- Space Map Style Core css -->
@stop

@section('search')
  <div class="navbar-fixed" id="search">
    <nav role="navigation">
     <div class="nav-wrapper">



     </div>
    </nav>
  </div>

@stop

@section('content')

<!-- App Body -->
<div class="app-body row">
  @if( $resources->count() == 0)
    <!-- Box Nothing -->
    <div class="col s12">
      <div class="box-nothing">
        <i class="material-icons">pin_drop</i>
        <h5 class="light">Woops! It looks lonely here. </h5>
        <p class="light">There are no spaces, start one clicking bellow! </p>
        <a href="{{ url('create') }}" class="btn btn-new">Create Space</a>
      </div>
    </div>
    <!-- Box Nothing -->
  @else

  <div class="col s12 m12 l8 listed-boxes">
    <!-- Listed -->
    @foreach($resources as $resource)

      <!-- Left Column -->
      <div class="col m6 l4">

        <!-- Listed Box -->
        <div class="listed-box">
            <img src="{{ route('get.imgFromStorage', [
                    'folder' => 'thumbnails',
                    'resource' => 'space',
                    'filename' => $resource->thumbnail
                    ]) }}" alt="... "/>
            <!-- Listed Body -->
            <div class="listed-body">

              <p>
                <span class="star">
                  @if($resource->stars == 0)
                    @for ($i = $resource->stars; $i < 5; $i++)
                      <i class="material-icons not_filled">star</i>
                    @endfor
                  @endif

                  @for ($i = 1; $i <= $resource->stars; $i++)
                  <i class="material-icons filled">star</i>
                    @if(($i == $resource->stars) and ($resource->stars != 5))
                      @for ($i = $resource->stars; $i < 5; $i++)
                        <i class="material-icons not_filled">star</i>
                      @endfor
                    @endif
                  @endfor
                  </span>
              </p>

              <h6 class="truncate">{{ $resource->title }}</h6>
              <p>
                <span class="variable">{{ $city = App\City::where('id', $resource->city_id)->first() }}</span>
                <span class="location"><i class="material-icons">location_on</i>{{ $city->name }}, {{ $city->country }}</span>
              </p>
              <p>
                <span class="category space">{{ $resource->type }} -  {{ $resource->room }}</span>
              </p>

              <p class="extra">

                <span class="tooltipped" data-position="bottom" data-delay="20" data-tooltip="Guests">
                  <i class="material-icons">people</i>
                  <span class="information">{{ $resource->capacity }}</span>
                </span>

                <span class="tooltipped" data-position="top" data-delay="20" data-tooltip="Bedrooms">
                  <i class="material-icons">domain</i>
                  <span class="information">{{ $resource->bedrooms }}</span>
                </span>

                <span class="tooltipped" data-position="bottom" data-delay="20" data-tooltip="Beds">
                  <i class="material-icons">airline_seat_individual_suite</i>
                  <span class="information">{{ $resource->beds }}</span>
                </span>

                <span class="tooltipped" data-position="top" data-delay="20" data-tooltip="Bathrooms">
                  <i class="material-icons">whatshot</i>
                  <span class="information">{{ $resource->bathrooms }}</span>
                </span>
              </p>

            </div>
            <!-- Listed Body -->

            <!-- Price & Button -->
            <div class="listed-bottom row">
              <!-- Price -->
              <div class="col s9">
                <div class="price-box">
                  <p class="currency-box">
                    <span class="currency">{{ $resource->currency }}</span>
                  </p>
                  <p>
                    <span class="sign">$</span>
                     <span class="price">{{ $resource->price }}</span>
                     <span class="per"> /{{ $resource->per }}</span>
                   </p>
                </div>
              </div>
              <!-- End of Price -->

              <!-- Button -->
              <div class="col s3">
                <a href="#" class="btn">Book</a>
              </div>
              <!-- End of Button -->
            </div>
            <!-- End of Price & Button -->

        </div>
        <!-- Enf of Listed Box -->

      </div>
      <!-- End of Left Column -->


    @endforeach
    <!-- End of Listed -->

    <!-- Pagination -->
    <div class="col s12">
      <div class="center">
        {!! $resources->render() !!}
      </div>
    </div>
    <!-- End of Pagination -->

  </div>

  <div class="resource-map col l4" id="space_map"></div>

  @endif


</div>
<!-- App Body -->
@stop
