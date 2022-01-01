@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-9  col-xl-6">
      <div class="card" style="border-radius: 15px;">
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Firts Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email adress</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    <tbody>
                        <tr>
                            <td>{{$user->fname}} </td>
                            <td>{{$user->lname}} </td>
                            <td>{{$user->email}}</td>
                            <td><a href="{{route('viewuser', $user->id)}}">View user</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            {{$users->links('pagination::bootstrap-4')}}
        </div>
      </div>
    </div>
</div>
@endsection