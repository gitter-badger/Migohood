@extends('layouts.edit')
@section('title')
  Photos - {{ $office->type }}, {{ $office->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'basics' ]) }}"><li><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'location' ]) }}"><li><i class="material-icons left">location_on</i>Location</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'photos' ]) }}"><li class="active"><i class="material-icons left">add_a_photo</i>Photos</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'pricing' ]) }}"><li><i class="material-icons left">receipt</i>Pricing</li></a>
    <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'extras' ]) }}"><li><i class="material-icons left">star</i>Extras</li></a>
  </ul>
@stop

@section('content')

  <!-- Title -->
  <div class="title">
     <h5>Tumbnail</h5>
     <p class="light">Everyone love view pictures of places they are interested in. Start with a thumbnail.
     This is almost the most important, is the first picture that hoster will see. </p>
     <div class="divider"></div>
  </div>

  <!-- Uddate Office Thumbnail -->
  <form class="form row" id="pic" action="{{ route('office.router.update', ['hash' => $office->hash, 'route' => 'thumbnail' ]) }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="thumb center col s7">
        <img class="materialboxed" src="{{ $office->thumbnail }}" alt="" />
      </div>

      <div class="col s5 file-field input-field">
       <div class="btn btn-update">
         <span>Update</span>
         <input type="file" name="file">
       </div>
       <div class="file-path-wrapper">
         <input class="file-path validate" type="text">
       </div>
     </div>

     <div class="col s5 submit">
        <input type="submit" class="btn btn-submit" value="Save"/>
     </div>

  </form>
  <!-- Uddate Office Thumbnail -->

  <!-- Title -->
  <div class="title">
     <h5>Gallery</h5>
     <p class="light">Now It's time to show to the world your place! Upload multiple files here. These
     photos will be available when an user opens your announce. </p>
     <div class="divider"></div>
  </div>

    <!-- Uddate Office Gallery -->
    <form class="" id="pic" action="{{ route('office.router.update', ['hash' => $office->hash, 'route' => 'gallery' ]) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file[]" multiple><br><br>
        <div class="col s4 submit">
           <input type="submit" class="btn btn-submit" value="Save"/>
        </div>
        @if (count($photos) == 0)
        <div class="col s8">
          <div class="col s6 pics">
              <img class="materialboxed" src="/img/app/thumbnail.png" alt=""/>
          </div>
          <div class="col s6 pics">
              <img class="materialboxed" src="/img/app/thumbnail.png" alt=""/>
          </div>
        </div>
        @else
        <div class="col s8 row">
          @foreach ($photos as $photo)
            <div class="col s6 pics">
              <img class="materialboxed" src="{{ $photo->path }}" alt="" width="200px"/>
            </div>
          @endforeach
        </div>
        @endif
    </form>
    <!-- Uddate office Gallery -->

  <div class="form row">
    <!-- Submit -->
    <div class="col s12 submit">
      <div class="left">
        <a href="{{ route('office.show', ['hash' => $office->hash ]) }}" class="btn btn-back">
          @if($office->public == 'yes') Show @endif
        </a>
      </div>

      <div class="right">
        <a href="{{ route('office.router', ['hash' => $office->hash, 'route' => 'pricing' ]) }}" class="btn btn-save" id="next">Save and Continue</a>
      </div>
    </div>
    <!-- Submit -->
  </div>


@stop

@section('info')
  @if($office->public == 'no')
    <img src="/img/app/space.png" alt="" />
      <h4 class="light">It's done</h4>
      <p class="light">
        Your new Office has been created, but.. It's not public yet. Please proceed to next steps
        to have your Office available for rent.
      </p>
  @else
  <img src="/img/app/graph.png" alt="" />
    <h4 class="light">It's done</h4>
    <p class="light">
      Your Office is public now.. You can start making money.
      Off course you can proceed to next steps to improve your announce,
      giving more details or editing those that you provied before makes
      your office better.
    </p>
  @endif
@stop
