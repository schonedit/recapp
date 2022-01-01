<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyRecipe</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
         <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto">
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('viewuser', Auth::user()->id)}}">{{Auth::user()->fname}}</a>
                </li>
            @endif
            @if (!Auth::check())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('showposts')}}">Home</a>
                </li>
            @endif
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('showposts')}}">What should I cook today?</a>
                </li>
            @endif
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('showuserposts', Auth::user()->id)}}">My recipes</a>
                </li>
            @endif
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('createpost')}}">Create Post</a>
                </li>
            @endif
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('viewsavings')}}">Favourites</a>
                </li>
            @endif
            </ul>

            <ul class="navbar-nav mb-auto">
            @if (!Auth::check())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
                </li>
            @endif
            @if (!Auth::check())
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('createuser')}}">Register</a>
                </li>
            @endif
            @if (Auth::check())
                <li class="nav-item">
            <form method="post" action="{{route('logout')}}"> @csrf
                <a class="nav-link active" aria-current="page" href="{{route('login')}}">
                    <button type="submit" class="btn btn-danger">Logout</button>
                </a>
            </form>
                </li>
            @endif
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
@if (!Auth::check())
<div class="container bg-dark">
    <div class="row">
      <div class="col-md-12">
        <div class="card bg-dark">
            <div class="card-header">
              <h1 class="display-4 font-italic" style="color: white">Easy recipes</h1>
              <p class="lead my-3" style="color: white">Keep it easy with these simple but delicious recipes. From make-ahead lunches and midweek meals to fuss-free sides and moreish cakes, we've got everything you need.</p>
              <p class="lead mb-0" style="color: white"><a href="{{route('login')}}" class="text-white font-weight-bold">Join us now!</a></p>
            </div>
        </div>
      </div>
    </div>
</div>
@endif

@yield('content')

</body>
</html>