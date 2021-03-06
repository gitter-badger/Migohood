@extends('layouts.edit')
@section('title', 'Space - Location')
@section('header')
  <script src="/js/jquery.min.js" type="text/javascript"></script>      <!-- Jquery core JS -->
  <script src="/js/pictures.js" type="text/javascript"></script>        <!-- Pictures core JS -->
@stop

@section('menu')
  @include('resources/spaces/edit.menu')
@stop

@section('content')
  <!-- Title -->
  <div class="title">
    <h5>Photos</h5>
    <p class="light">Share your space with the world. Please select a cover picture of your space</p>
  </div>
  <!-- End of Title -->

  <!-- Upload Space Thumbnail -->
  <form action="{{ route('resource.thumbnail.upload', [
    'resource'=> 'space',
    'hash' => $resource->hash
    ]) }}" method="POST" files="true" class="center single-photo" enctype="multipart/form-data">

    {{ csrf_field() }}

    <!-- Preview -->
    <div class="thumb-preview">
      <img id="thumb-pic" class="z-depth-1"
        @if($resource->thumbnail == '/img/app/thumbnail.png')
          src="{{ url( $resource->thumbnail ) }}"
        @else
          src="{{ route('get.imgFromStorage', [
            'folder' => 'thumbnails',
            'resource' => 'space',
            'filename' => $resource->thumbnail
            ]) }}"
        @endif
      alt="thumbnail" />
    </div>
    <!-- End of Preview -->

    <!-- Input -->
    <div class="variable">
      <input id="thumb-input" type="file" name="pic" accept="image/*">
      <button type="submit" id="thumb-send"></button>
    </div>
    <!-- End of Input -->

    <!-- Submit -->
    <div class="thumb-button"><br>
      <button id="thumb-submit" class="btn">Upload</button>
    </div>
    <!-- End of Submit -->

  </form>
  <!-- End of Upload Space Thumbnail -->

  <!-- Title -->
  <div class="title">
    <h5>Gallery</h5>
    <p class="light">Now It's time to show to the world your place! Upload multiple files here.</p>
  </div>
  <!-- End of Title -->

  <!-- Uddate Space Gallery -->
  <form action="{{ route('resource.gallery.upload', [
     'resource' => 'space',
     'hash' => $resource->hash
    ]) }}" method="POST" files="true" class="center multiple-photos" enctype="multipart/form-data">

    {{ csrf_field() }}

    <!-- Div -->
    <div class="gallery-div">

    <span class="variable"> {{ $photos = App\Photo::where('hash', $resource->hash )->get() }}</span>

        @if( $photos->count() > 0 )
          @foreach ($photos as $photo)
            <div class="col s12 m6 l4">
              <div class="deleteable">
                <a href="{{ route('delete.imgFromStorage', [
                        'folder' => 'galleries',
                        'resource' => 'space',
                        'filename' => $photo->filename
                        ]) }}"> <i class="material-icons">close</i></a>
              </div>
              <img class="z-depth-1"
                   src="{{ route('get.imgFromStorage', [
                        'folder' => 'galleries',
                        'resource' => 'space',
                        'filename' => $photo->filename
                        ]) }}"
                    alt="..." />
            </div>
          @endforeach
        @endif

        <div class="col s12 m6 l4">
          <div class="gallery-button">

           <!-- Input -->
           <div class="variable">
              <input id="gallery-input" type="file" name="file[]" multiple accept="image/*">
              <button type="submit" id="gallery-send"></button>
            </div>
            <!-- End of Input -->

            <!-- Submit -->
            <div id="gallery-submit">
                <div class="gallery-button-body center">
                  <i class="material-icons">add_a_photo</i><br>
                  <span>Add Pictures</span>
                </div>
            </div>
            <!-- End of Submit -->

          </div>
        </div>

    </div>
    <!-- End of Div -->
  </form>
  <!-- End of Uddate Space Gallery -->


  <!-- Next Button -->
  <div class="col s12 next">
    <a href="{{ route('resource.router', [
      'resource' => 'space',
      'hash' => $resource->hash,
      'route'=> 'price'
      ]) }}"
      class="btn ">NEXT</a>
  </div>
  <!-- End of Next Button -->

@stop

@section('info')
  <img src="/img/app/space.png" alt="" /><!-- Change it -->
  <h5 class="light">Almost Done!</h5>
  <p class="light">
     Describe your place as best you can. The better you describe your space, more guests you'll get.
  </p>
@stop
