@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Everyday Cooking
              @if (Auth::check())
              <a href="{{ url('/posts/add')}}" class="btn btn-primary float-end">Add recipe</a>
              @endif
            </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <tbody>
                  @foreach ($posts as $item)
                  <tr>

                    <td class="col-md-2">
                      <img src="{{ asset('uploads/posts/'.$item->profile_image) }}" width="170px" height="170px" alt="Image">
                    </td>

                    <td class="col-md-3">
                      <ul class="list-unstyled">
                        <li style="font-size: 25px">{{$item->title}}</li>
                      </ul>
                    </td>

                    <td class="col-md-3">
                      <ul class="list-unstyled">
                        <li>Made By:</li>
                        <div class="whatever" style="visibility: hidden">{{$user = App\Models\User::find($item->user_id)}}</div>
                        <li style="font-size: 25px">{{$user->fname}} {{$user->lname}}</li>
                      </ul>
                    </td>
                    <td  style="text-align: center; vertical-align: middle;" class="col-md-6"><a href="{{route('showrecipe', $item->id)}}">View recipt</a></td>
                    <td style="text-align: center; vertical-align: middle;">
                      <form method="post" action="{{route('createsavings', $item->id)}}"> @csrf
                        <a class="nav-link active" aria-current="page">
                          <button type="submit" class="btn btn-primary">Save for:</button>
                          <select name="category" id="category">
                            <option value="lunch">lunch</option>
                            <option value="breakfast">breakfast</option>
                            <option value="dinner">dinner</option>
                            <option value="other">other</option>
                          </select>
                        </a>
                    </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          {{$posts->links('pagination::bootstrap-4')}}
      </div>
      </div>
    </div>
</div>

@endsection