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
              <h4>My recipe
                <a href="{{ url('/posts/view/myposts')}}" class="btn btn-danger float-end">Back</a>
              </h4>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('updateuserpost', $post->id)}}" enctype="multipart/form-data"> @csrf
                <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}"/>
                </div>

                <div class="form-group mb-3">
                    <label for="">Recipe</label>
                    {{-- <input type="text" name="content" class="form-control" value="{{$post->content}}"/> --}}
                    <textarea type="text" name="content" class="form-control" cols="40" rows="5">
                        {{$post->content}}
                    </textarea>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection