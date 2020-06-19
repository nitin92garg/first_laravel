@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter the user you want to edit.</div>

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
                    
                <form method="get"  >
                        @csrf
                        <div class="form-row">
                          <div class="col-md-3 mb-3">
                            <label for="validationDefault05">User ID</label>
                            <input type="number" name="userid" class="form-control" id="validationDefault05" required>
                          </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                </form>

                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
