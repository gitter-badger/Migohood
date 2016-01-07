@extends('layouts.app')
@section('title', 'Explore')
@section('header')
  <link href="/css/explore.css" rel="stylesheet">   <!-- Custom core CSS -->
@stop
@section('content')

<!-- Content-->
<section class="row" id="explore">
  <div class="col s3 search">
    
  </div>
  <div class="col s9 row">
     @include('common.announces')

     <!-- pagination -->
     <div class="center">
       <ul class="pagination">
         <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
         <li class="active"><a href="#!">1</a></li>
         <li class="waves-effect"><a href="#!">2</a></li>
         <li class="waves-effect"><a href="#!">3</a></li>
         <li class="waves-effect"><a href="#!">4</a></li>
         <li class="waves-effect"><a href="#!">5</a></li>
         <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
       </ul>
     </div>
     <!-- pagination -->
  </div>

</div>
</section>
<!-- Content-->
<!--
Hello from Explore

@if(Auth::check())
  <h3>User info</h3>
  <ul>
  <li>id = {{ Auth::user()->id }}</li>
  <li>name = {{ Auth::user()->name }}</li>
  <li>lastname = {{ Auth::user()->lastname }}</li>
  <li>email = {{ Auth::user()->email }}</li>
  <li>created at = {{ Auth::user()->created_at }}</li>
  <li>updated at = {{ Auth::user()->updated_at }}</li>
  </ul>
  <a href="auth/logout">Log out</a>
@endif-->

@stop
