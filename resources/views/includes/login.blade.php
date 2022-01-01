@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-9  col-xl-6">
      <div class="card" style="border-radius: 15px;">
        <div class="card-body">

          <h6 style="color: red">@include('includes.validation')</h6>

            <form action="{{route('signin')}}" method="post" class="form-signin"> @csrf

                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                 
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>

        </div>
      </div>
    </div>
</div>
@endsection