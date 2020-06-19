@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" >List of Users</div>
            </div>
            <br><br><br><br>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
            <td>{{$user->email}}</td>
            <td><a href="{{route('edituser',$user->id)}}">View User</a></td>
        </tr>
        @endforeach      
    </tbody>
  </table>
  {{$users->links()}}
</div></div></div>
                
           
@endsection
