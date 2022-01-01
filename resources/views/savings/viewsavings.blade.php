@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>My saved recipes
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
                    <th>Category</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $item)
                  <tr>
                    <td>
                      <img src="{{ asset('uploads/posts/'.$item->profile_image) }}" width="100px" height="100px" alt="Image">
                    </td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->content}}</td>
                    <td>{{$item->scategory}}</td>
                    <td>
                      <form method="post" action="{{route('deletesavings', $item->saveditemid)}}"> @csrf
                      <button type="submit" class="btn btn-danger float-end">Delete</button>
                      </form>
                      </td>
                    <td>
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