@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">

                <h4 class="text-uppercase text-center mb-5">Create a MyReceipt account
                  <a href="{{ url('/posts')}}" class="btn btn-danger float-end">Back</a>
                </h4>
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <h6 class="alert alert-danger"><li>{{$error}}</li></h6>
                    @endforeach
                </ul>
                @endif

                <form method="post" action="{{route('createuser')}}">
                @csrf
                  <div class="form-outline mb-4">
                    <input type="text" 
                    name="fname" 
                    class="form-control form-control-lg" 
                    value="{{old('fname')}}"/>
                    <label class="form-label" for="form3Example1cg">Your First Name</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" name="lname" class="form-control form-control-lg" value="{{old('lname')}}"/>
                    <label class="form-label" for="form3Example3cg">Your Last Name</label>
                  </div>
  
                  <div class="form-outline mb-4">
                    <input type="email" name="email" class="form-control form-control-lg" value="{{old('email')}}"/>
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                  </div>
  
                  <div class="form-outline mb-4">
                    <input type="password" name="password" class="form-control form-control-lg" value="{{old('password')}}"/>
                    <label class="form-label" for="form3Example4cg">Password</label>
                  </div>
  
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>
  
                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('login')}}" class="fw-bold text-body"><u>Login here</u></a></p>
  
                </form>
  
              </div>
            </div>
          </div>
        </div>
        <br>
<br>
<br>
<br>
<br>
<br>
@endsection