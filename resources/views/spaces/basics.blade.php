@extends('layouts.edit')
@section('title')
  {{ $space->type }}, {{ $space->accomodance }}
@stop
@section('menu')
  <ul>
    <a href="{{ route('space.basics', ['hash' => $space->hash ]) }}"><li class="active"><i class="material-icons left">library_books</i>Basics</li></a>
    <a href="#"><li><i class="material-icons left">border_color</i>Description</li></a>
    <a href="#"><li><i class="material-icons left">location_on</i>Location</li></a>
    <a href="#"><li><i class="material-icons left">add_a_photo</i>Photo</li></a>
    <a href="#"><li><i class="material-icons left">receipt</i>Pricing</li></a>
    <a href="#"><li><i class="material-icons left">star</i>Extras</li></a>
  </ul>
@stop

@section('content')
  <div class="title">
     <h5>Give more details</h5>
     <p  class="light">People can filter by listing basics to find a space they like. </p>
     <div class="divider"></div>
  </div>

  <div class="form row">

    <div class="input-field col s4">
      <select name="type" id="Select" onchange="ShowInput()" require>
        <option value="" disabled selected>Choose your option</option>
        <option value="Department" @if($space->type == 'Department') selected="selected" @endif>Department</option>
        <option value="House" @if($space->type == 'House') selected="selected" @endif>House</option>
        <option value="Bed and Breakfast" @if($space->type == 'Bed and Breakfast') selected="selected" @endif>Bed and Breakfasts </option>
        <option value="Other" @if($space->type == 'Other') selected="selected" @endif>Bed and Breakfasts </option>
      </select>
      <label>Property Type</label>

      </div>
      <!--Other Input-->



    </div>

    <div class="col s12 submit">
      <div class="left">
        <a href="#" class="btn btn-back">Preview</a>
      </div>

      <div class="right">
          <button type="submit" class="btn btn-save" id="next">Next</button>
      </div>
    </div>
  </div>
@stop

@section('info')
<img src="/img/app/space.png" alt="" />

<h4 class="light">It's done</h4>
<p class="light">
  Your new Space has been created, but.. It's not public yet. Please proceed to nexts steps
  to have your space available for rent.
</p>
@stop
