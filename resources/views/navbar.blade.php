<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
    {{--<script src="{{asset('js/app.js')}}"></script>--}}

</head>
<body>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="{{route('dashboard.index')}}">LARAVEL</a>

    <!-- Links -->
    <ul class="navbar-nav">


        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Category
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('category.create')}}">Add New</a>
                <a class="dropdown-item" href="{{route('category.index')}}">List</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Post
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('post.create')}}">Add New</a>
                <a class="dropdown-item" href="{{route('post.index')}}">List</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Students
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('student.create')}}">Add New</a>
                <a class="dropdown-item" href="{{route('student.index')}}">List</a>
            </div>
        </li>

    </ul>
    <ul class="navbar-nav ml-auto">

        @auth()
            <li class="nav-item">
                <a class="nav-link" href="">
                    Profile({{auth()->user()->first_name}})
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        @endauth

        @guest()
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/register') }}"><i class="fas fa-user-plus"></i> Register</a>
            </li>
        @endguest


    </ul>
</nav>
<br>

<div class="main-container">
    {{--@include('error')--}}
    @yield('content')
</div>

</body>
</html>