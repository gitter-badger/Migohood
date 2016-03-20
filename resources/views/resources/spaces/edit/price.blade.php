@extends('layouts.edit')
@section('title', 'Space - Basics')
@section('menu')
  @include('resources/spaces/edit.menu')
@stop

@section('content')

  <!-- Update Space Description -->
  <form class="" action="{{ route('resource.router.update', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'price',
    'next' => 'extras'
    ]) }}" method="POST">

    {{ csrf_field() }}

  <!-- Title -->
  <div class="title">
    <h5>Price</h5>
    <p class="light">Choose your own price</p>
  </div>
  <!-- End of Title -->

    <!-- Price -->
    <div class="input-field col s12 m6 l4">
      <input Placeholder="$ .00" id="price" type="text" name="price" required @if($resource->price != NULL) value="{{ $resource->price }}" @endif>
      <label class="active" for="price">Price</label>
    </div>
    <!-- End of Price -->

    <!-- Per -->
    <div class="input-field col s12 m3 l4">
      <select name="per" required>
        <option value="" disabled selected>Choose one</option>
        <option value="Night" @if($resource->per == 'Night') selected="selected" @endif> Night </option>
        <option value="Week" @if($resource->per == 'Week') selected="selected" @endif> Week </option>
        <option value="Month" @if($resource->per == 'Month') selected="selected" @endif> Month </option>
      </select>
      <label>Per</label>
    </div>
    <!-- End of Per -->

    <!-- Currency -->
    <div class="input-field col s12 m3 l4">
      <select name="currency" required>
        <option value="" disabled selected>Choose one</option>
        <option value="USD" @if($resource->currency == 'USD') selected="selected" @endif> USD </option>
        <option value="COP" @if($resource->currency == 'COP') selected="selected" @endif> COP </option>
      </select>
      <label>Currency</label>
    </div>
    <!-- End of Currency -->


    <!-- Check in -->
    <div class="input-field col s12 m6 l4">
      <select name="check_in" required>
        <option value="" disabled selected>Choose one</option>
        <span class="variable">{{ $times=App\Time::all() }}</span>
        @foreach($times as $time)
          <option value="{{ $time->time }}" @if($resource->check_in == $time->time ) selected='selected' @endif> {{ $time->time }} </option>
        @endforeach
      </select>
      <label>Preferible Check in</label>
    </div>
    <!-- End of Check in -->

    <!-- Check out -->
    <div class="input-field col s12 m6 l4">
      <select name="check_out" required>
        <option value="" disabled selected>Choose one</option>
        <span class="variable">{{ $times=App\Time::all() }}</span>
        @foreach($times as $time)
          <option value="{{ $time->time }}" @if($resource->check_out == $time->time ) selected='selected' @endif> {{ $time->time }} </option>
        @endforeach
      </select>
      <label>Preferible Check Out</label>
    </div>
    <!-- End of Check out -->

    <!-- Next Button -->
    <div class="col s12 next">
      <button type="submit" class="btn ">NEXT</button>
    </div>
    <!-- End of Next Button -->

  </form>
  <!-- End of Update Space Price -->

@stop

@section('info')
  <img src="/img/app/space.png" alt="" /><!-- Change it -->
  <h5 class="light">Almost Done!</h5>
  <p class="light">
     Describe your place as best you can. The better you describe your space, more guests you'll get.
  </p>
@stop
