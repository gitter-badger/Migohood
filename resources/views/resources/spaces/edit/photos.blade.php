@extends('layouts.edit')
@section('title', 'Space - Location')
@section('header')
  <link href="/css/dropzone.min.css" rel="stylesheet">                        <!-- Dropzone Style core CSS -->
  <script src="/js/jquery.min.js" type="text/javascript"></script>            <!-- Jquery core JS -->
  <script src="/js/dropzone.min.js" type="text/javascript"></script>          <!-- Dropzone core JS -->
  <script src="/js/resource_dropzone.js" type="text/javascript"></script>     <!-- Resource Dropzone core JS -->
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

  <form action="{{ route('resorce.thumbnail.upload', [
    'resource'=> 'space',
    'hash' => $resource->hash
    ]) }}"
    id="thumb" method="POST" files="true" class="center single-dropzone">

    {{ csrf_field() }}

    <div class="thumb-preview">
      <img id="thumb-pic" class="z-depth-1" src="{{ url( $resource->thumbnail ) }}" alt="" />
    </div>

    <div class="thumb-button"><br>
      <button id="thumb-submit" class="btn"><i class="material-icons left">add_a_photo</i>Upload</button>
    </div>

  </form>

  <!-- Title -->
  <div class="title">
    <h5>Gallery</h5>
    <p class="light">Now It's time to show to the world your place! Upload multiple files here.</p>
  </div>
  <!-- End of Title -->

  <div class="col s12 next">
    <button class="btn ">NEXT</button>
  </div>

@stop

@section('info')
  <img src="/img/app/space.png" alt="" /><!-- Change it -->
  <h5 class="light">Almost Done!</h5>
  <p class="light">
     Describe your place as best you can. The better you describe your space, more guests you'll get.
  </p>
@stop
