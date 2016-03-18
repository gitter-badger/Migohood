@extends('layouts.app_extended')
@section('title', 'My Spaces')
@section('menu')
    @include('users/dashboard.menu')
@stop

@section('content')

@if(App\Space::where('user_id', Auth::user()->id)->count() == 0)
  <!-- Box Nothing -->
  <div class="box">
    <div class="box-nothing">
      <i class="material-icons">pin_drop</i>
      <h5 class="light">Woops! It looks lonely here. </h5>
      <p class="light">You don't have any space, start one clicking bellow! </p>
      <a href="{{ url('create') }}" class="btn btn-new">Create Space</a>
    </div>
  </div>
  <!-- Box Nothing -->
@else

  <!-- Box Content  -->
  <div class="box-content">

    <!-- Spaces Listed -->
    <span class="variable">{{ $listed = App\Space::where('user_id', Auth::user()->id)
                                                   ->where('status', 'listed')
                                                   ->orderBy('created_at', 'desc')
                                                   ->get() }}</span>
    @if( $listed->count() > 0)
    <div class="col s12 l6">

      <span class="lil-title">Listed</span>

      <ul class="collection">
        @foreach($listed as $listed)
          <li class="collection-item avatar">
            <img
                  @if($listed->thumbnail == '/img/app/thumbnail.png')
                    src="{{ url( $listed->thumbnail ) }}"
                  @else
                    src="{{ route('get.imgFromStorage', [
                      'folder' => 'thumbnails',
                      'resource' => 'space',
                      'filename' => $listed->thumbnail
                      ]) }}"
                  @endif
            alt="... "/>
            <span class="title">{{ $listed->title }}</span>
            <p class="second"><span class="category space">{{ $listed->type }} - {{ $listed->room }} Room</span> </p>
            <span class="tird"> Created {{ $listed->created_at->diffForHumans() }}</span>

            <div class="secondary-content">
              <a href="#"><i class="material-icons">remove_red_eye</i></a>

              <a href="{{ route('resource.router', [
                'resource'=> 'space',
                'hash' => $listed->hash,
                'route' => 'basics'
                ]) }}"><i class="material-icons">mode_edit</i></a>

              <a href="#"><i class="material-icons">delete</i></a>

            </div>
          </li>
        @endforeach
      </ul>
    </div>
    @endif
    <!-- End of Spaces Listed -->


    <!-- Spaces Not Listed -->
    <span class="variable">{{ $not_listed = App\Space::where('user_id', Auth::user()->id)
                                                      ->where('status', 'not_listed')
                                                      ->orderBy('created_at', 'desc')
                                                      ->get() }}</span>
    @if( $not_listed->count() > 0)

    <div class="col s12 l6">

      <span class="lil-title">Not Listed</span>

      <ul class="collection">
        @foreach($not_listed as $not_listed)
          <li class="collection-item avatar">
            <img
                  @if($not_listed->thumbnail == '/img/app/thumbnail.png')
                    src="{{ url( $not_listed->thumbnail ) }}"
                  @else
                    src="{{ route('get.imgFromStorage', [
                      'folder' => 'thumbnails',
                      'resource' => 'space',
                      'filename' => $not_listed->thumbnail
                      ]) }}"
                  @endif
            alt="... "/>
            <span class="title">{{ $not_listed->type }}</span>
            <p class="second"><span class="category space">{{ $not_listed->room }} Room</span> </p>
            <span class="tird"> Updated {{ $not_listed->created_at->diffForHumans() }}</span>

            <div class="secondary-content">

              <a href="{{ route('resource.router', [
                'resource'=> 'space',
                'hash' => $not_listed->hash,
                'route' => 'basics'
                ]) }}"><i class="material-icons">mode_edit</i></a>

              <a href="#"><i class="material-icons">delete</i></a>

            </div>

          </li>
        @endforeach
      </ul>
    </div>
    @endif
    <!-- End of Spaces Not Listed -->

  </div>
  <!-- End of Box Content  -->

@endif
@stop
