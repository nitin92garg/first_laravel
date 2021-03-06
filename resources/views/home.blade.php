@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create users</div>

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
                            {{session()->get('danger')}}
                    @endif
                
                    @if($errors->any())
                        <ul>
                        @foreach($errors->all() as $error)
                
                        <li>  {{$error}} </li>
                
                        @endforeach
                        </ul>
                    @endif
                    {{-- action="{{route('create')}}" --}}
                    <form method="POST" >
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                  <input type="text" class="form-control" name="first_name" placeholder="First name" required>
                                </div>
                                <div class="col">
                                  <input type="text" class="form-control" name="last_name" placeholder="Last name" required>
                                </div>
                            </div>  
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Enter email">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
                          <small id="" class="form-text text-muted">Minimum 8 Characters required</small>
                        </div>
                        <div class="form-group">
                            <label for="comment">Notes:</label>
                            <textarea class="form-control" rows="5" name="notes" placeholder="Notes" id="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        
                    </form>

                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
