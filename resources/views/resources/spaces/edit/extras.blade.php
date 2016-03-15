@extends('layouts.edit')
@section('title', 'Space - Description')
@section('menu')
  @include('resources/spaces/edit.menu')
@stop

@section('content')
  <!-- Title -->
  <div class="title">
    <h5>Extras</h5>
    <p class="light">Additional amenities makes your announce interesting. Choose what you offer.</p>
  </div>
  <!-- End of Title -->

  <!-- Update Space Description -->
  <form class="" action="{{ route('resource.router.update', [
    'resource'=> 'space',
    'hash' => $resource->hash,
    'route' => 'extras',
    'next' => 'finish'
    ]) }}" method="POST">

    {{ csrf_field() }}


    <!-- Checboxes 1 -->
    <div class="checkboxes col s12 m6 l6">

      <p><input type="checkbox" name="towels" value="yes" id="towels" @if($resource->towels == 'yes') checked="checked" @endif />
      <label for="towels">Towels</label></p>

      <p><input type="checkbox" name="bed_sheets" value="yes" id="bed_sheets" @if($resource->bed_sheets == 'yes') checked="checked" @endif />
      <label for="bed_sheets">Bed Sheets</label></p>

      <p><input type="checkbox" name="soap" value="yes" id="soap" @if($resource->soap == 'yes') checked="checked" @endif />
      <label for="soap">Soap</label></p>

      <p><input type="checkbox" name="shampoo" value="yes" id="shampoo" @if($resource->shampoo == 'yes') checked="checked" @endif />
      <label for="shampoo">Shampoo</label></p>

      <p><input type="checkbox" name="toilet_paper" value="yes" id="toilet_paper" @if($resource->toilet_paper == 'yes') checked="checked" @endif />
      <label for="toilet_paper">Toilet paper</label></p>

      <p><input type="checkbox" name="cleaning_kit" value="yes" id="cleaning_kit" @if($resource->cleaning_kit == 'yes') checked="checked" @endif />
      <label for="cleaning_kit">Cleaning Kit</label></p>

      <p><input type="checkbox" name="iron" value="yes" id="iron" @if($resource->iron == 'yes') checked="checked" @endif />
      <label for="iron">Iron</label></p>

      <p><input type="checkbox" name="hair_dryer" value="yes" id="hair_dryer" @if($resource->hair_dryer == 'yes') checked="checked" @endif />
      <label for="hair_dryer">Hair Dryer</label></p>

      <p><input type="checkbox" name="elevator" value="yes" id="elevator" @if($resource->elevator == 'yes') checked="checked" @endif />
      <label for="elevator">Elevator</label></p>

      <p><input type="checkbox" name="hot_tub" value="yes" id="hot_tub" @if($resource->hot_tub == 'yes') checked="checked" @endif />
      <label for="hot_tub">Hot Tub</label></p>

      <p><input type="checkbox" name="washer" value="yes" id="washer" @if($resource->washer == 'yes') checked="checked" @endif />
      <label for="washer">Washer</label></p>

      <p><input type="checkbox" name="dishwasher" value="yes" id="dishwasher" @if($resource->dishwasher == 'yes') checked="checked" @endif />
       <label for="dishwasher">Dishwasher</label></p>

    </div>
    <!-- End of Checboxes 1 -->

    <!-- Checboxes 2 -->
    <div class="checkboxes col s12 m6 l6">

      <p><input type="checkbox" name="wheelchair_access" value="yes" id="wheelchair_access" @if($resource->wheelchair_access == 'yes') checked="checked" @endif />
      <label for="wheelchair_access">Wheelchair Access</label></p>

      <p><input type="checkbox" name="AC" value="yes" id="AC" @if($resource->AC == 'yes') checked="checked" @endif />
      <label for="AC">AC</label></p>

      <p><input type="checkbox" name="heat" value="yes" id="heat" @if($resource->heat == 'yes') checked="checked" @endif />
      <label for="heat">Heat</label></p>

      <p><input type="checkbox" name="ByB" value="yes" id="ByB" @if($resource->ByB == 'yes') checked="checked" @endif />
      <label for="ByB">B &amp; B</label></p>

      <p><input type="checkbox" name="workspace" value="yes" id="workspace" @if($resource->workspace == 'yes') checked="checked" @endif />
      <label for="workspace">Workspace</label></p>

      <p><input type="checkbox" name="pool" value="yes" id="pool" @if($resource->pool == 'yes') checked="checked" @endif />
      <label for="pool">Pool</label></p>

      <p><input type="checkbox" name="sauna" value="yes" id="sauna" @if($resource->sauna == 'yes') checked="checked" @endif />
      <label for="sauna">Sauna</label></p>

      <p><input type="checkbox" name="terrace" value="yes" id="terrace" @if($resource->terrace == 'yes') checked="checked" @endif />
      <label for="terrace">Terrace</label></p>

      <p><input type="checkbox" name="chef" value="yes" id="chef" @if($resource->chef == 'yes') checked="checked" @endif />
      <label for="chef">Chef</label></p>

      <p><input type="checkbox" name="translator" value="yes" id="translator" @if($resource->translator == 'yes') checked="checked" @endif />
      <label for="translator">Translator</label></p>

      <p><input type="checkbox" name="flexible_check_in" value="yes" id="flexible_check_in" @if($resource->flexible_check_in == 'yes') checked="checked" @endif />
      <label for="flexible_check_in">Flexible check in</label></p>

      <p><input type="checkbox" name="flexible_check_out" value="yes" id="flexible_check_out" @if($resource->flexible_check_out == 'yes') checked="checked" @endif />
      <label for="flexible_check_out">Flexible check out</label></p>

    </div>
    <!-- End of Checboxes 2 -->

    <!-- Next Button -->
    <div class="col s12 next">
      <button type="submit" class="btn ">NEXT</button>
    </div>
    <!-- End of Next Button -->

  </form>
  <!-- End of Update Space Description -->

@stop

@section('info')
  <img src="/img/app/space.png" alt="" /><!-- Change it -->
  <h5 class="light">Almost Done!</h5>
  <p class="light">
     Describe your place as best you can. The better you describe your space, more guests you'll get.
  </p>
@stop
