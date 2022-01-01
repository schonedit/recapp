@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>{{Auth::user()->fname}}'s recipes
                <a href="{{ url('/posts')}}" class="btn btn-danger float-end">Back</a>
            </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Recipe</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $item)
                  <tr>
                    <td>
                      <img src="{{ asset('uploads/posts/'.$item->profile_image) }}" width="160px" height="160px" alt="Image">
                    </td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->content}}</td>
                    <td>
                      <form method="post" action="{{route('deleteuserposts', $item->id)}}"> @csrf
                      <button type="submit" class="btn btn-danger float-end">Delete</button>
                      </form>
                      </td>
                    <td>
                      <form method="get" action="{{route('updatepost', $item->id)}}"> @csrf
                      <button type="submit" class="btn btn-secondary float-end">Edit</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection