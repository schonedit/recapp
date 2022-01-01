@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">

        @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        <div class="card">
          <div class="card-header">
            <h4>Add post
              <a href="{{ url('/posts')}}" class="btn btn-danger float-end">Back</a>
            </h4>
            <h2 class="text-uppercase text-center mb-5">
                @include('includes.validation')
            </h2>
          </div>
          <div class="card-body">
              <form action="{{route('storepost')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Recipe</label>
                    {{-- <input type="text" name="content" class="form-control"> --}}
                    <textarea type="text" name="content" class="form-control" cols="40" rows="5">
                  </textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="">Profile picture</label>
                    <input type="file" name="profile_image" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Save</button></button>
                </div>

              </form>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection