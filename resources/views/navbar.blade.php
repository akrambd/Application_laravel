<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>

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
    </ul>
</nav>
<br>

<div class="main-container">
    @include('error')
    @yield('content')
</div>

</body>
</html>