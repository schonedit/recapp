@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>{{$post->title}}
                <a href="{{ url('/posts')}}" class="btn btn-danger float-end">Back</a>
            </h4>
          </div>
          <div class="card-body">
            <div class="container">
                <div class="row">
                  <div class="col">
                    <img src="{{ asset('uploads/posts/'.$post->profile_image) }}" width="250px" height="250px" alt="Image">
                  </div>
                  <div class="col">
                    {{$post->content}}
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                  <div class="col">
                    <h6>Made By: {{$user->fname}} {{$user->lname}}</h6>
                  </div>
                </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
</div>

@endsection