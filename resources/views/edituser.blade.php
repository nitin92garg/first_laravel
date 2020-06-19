@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if(session()->has('success'))
                        <div class="alert alert-success">  
                            {{session()->get('success')}}
                         </div>
                    @endif

                    @if(session()->has('danger'))
                        <div class="alert alert-danger">  
                            {{session()->get('danger')}}
                        </div>
                    @endif
                
                    @if($errors->any())
                        <ul>
                        @foreach($errors->all() as $error)
                
                        <li>  {{$error}} </li>
                
                        @endforeach
                        </ul>
                    @endif

                    <form method="POST" >
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name" placeholder="First name" required>
                                </div>
                                <div class="col">
                                  <input type="text" class="form-control" value="{{$user->last_name}}" name="last_name" placeholder="Last name" required>
                                </div>
                            </div>  
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" name="email" value="{{$user->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Enter email">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" value="{{$user->password}}" name="password" id="exampleInputPassword1" placeholder="Password" required>
                          <small id="" class="form-text text-muted">Minimum 8 Characters required</small>
                        </div>
                        <div class="form-group">
                            <label for="comment">Notes:</label>
                            <textarea class="form-control" rows="5" value="{{$user->notes}}" name="notes" placeholder="Notes" id="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                                             
                    </form>
                    <br><br>
                    <form method="post" action="{{route('deleteuser',$user->id)}}" >
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationDefault05">User ID</label>
                                <input type="number" name="userid" class="form-control" id="validationDefault05" required>
                            </div>
                            </div>
                            <!-- Button trigger modal -->
                            <button type="submit" class="btn btn-primary"  data-delid = {{$user->id}} >
                                Delete
                            </button>
                            <!-- Modal -->
                            {{-- <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post"   >
                                        @csrf
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Users</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want to delete this user?
                                        </div>
                                        <input type="hidden" name="delete_id" id="del_id" value="">
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">No,Cancel</button>
                                        <button type="submit" class="btn btn-warning">Yes,Delete</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div> --}}
                        </div>
                    </form>
                      
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
