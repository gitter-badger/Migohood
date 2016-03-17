@extends('layouts.panel')
@section('title', 'Dashboard')
@section('menu')
  <a href="{{ url('/admin/panel') }}"><li class="active"><i class="material-icons left">people</i> Users </li></a>
  <a href="#"><li><i class="material-icons left">business_center</i> Workers </li></a>
  <a href="#"><li><i class="material-icons left">library_books</i> Payments </li></a>
@stop

@section('content')
  <!-- Var -->
  <span class="variable">{{ $users=App\User::where('role', 'user')->get() }}</span>

  <!-- Table -->
  <table class="striped">

    <thead>
      <tr>
          <th>Id</th>
          <th>Ip</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Actions</th>
      </tr>
    </thead>

    <tbody>
      @foreach($users as $user)
        <tr>
          <td>
           <div class="chip">
             <img src="{{ url( $user->avatar ) }}" alt="Contact Person">
             {{ $user->id }}
           </div>
          </td>
          <td> {{ $user->ip }}</td>
          <td> {{ $user->name }} </td>
          <td> {{ $user->email }} </td>
          <td> {{ $user->role }} </td>
          <td> {{ $user->status }} </td>
          <td></td>
        </tr>
      @endforeach
    </tbody>

  </table>
  <!-- End of Table -->

@stop
