@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-9  col-xl-6">
      <div class="card" style="border-radius: 15px;">
        <div class="card-body">

            <h1>{{$user->fname}} {{$user->lname}}
              <a href="{{ url('/posts')}}" class="btn btn-danger float-end">Back</a></h1>

         <form method="post" action="{{route('updateuser', $user->id)}}"> @csrf
            <h2 class="text-uppercase text-center mb-5">
                @include('includes.validation')
            </h2>
              <div class="form-outline mb-4">
                <input type="text" 
                    name="fname" 
                    class="form-control form-control-lg" 
                    value="{{$user->fname}}"/>
                <label class="form-label" for="form3Example1cg">Your First Name</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text"
                    name="lname"
                    class="form-control form-control-lg" 
                    value="{{$user->lname}}"/>
                <label class="form-label" for="form3Example3cg">Your Last Name</label>
              </div>

              <div class="form-outline mb-4">
                <input type="email" 
                    name="email" 
                    class="form-control form-control-lg" 
                    value="{{$user->email}}"/>
                <label class="form-label" for="form3Example3cg">Your Email</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password"
                    name="password" 
                    class="form-control form-control-lg">
                <label class="form-label" for="form3Example4cg">Password</label>
              </div>

              <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save changes</button>
              </div>

            </form>

            {{-- <form action="{{route('deleteuser', $user->id)}}" method="post">@csrf
              <input type="text" name="userid" placeholder="Enter user id">
              <button type="submit">Delete user</button>
            </form> --}}

        </div>
      </div>
    </div>
</div>
@endsection