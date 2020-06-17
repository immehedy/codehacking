<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  @yield('styles')
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Codehacking</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Admin</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Users
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{route('admin.users.index')}}">All Users</a>
        <a class="dropdown-item" href="{{route('admin.users.create')}}">Create users</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Posts
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{route('admin.posts.index')}}">All Posts</a>
        <a class="dropdown-item" href="{{route('admin.posts.create')}}">Create Posts</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Media
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{route('admin.media.index')}}">Media List</a>
        <a class="dropdown-item" href="{{route('admin.media.create')}}">Upload</a>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.categories.index')}}">Categories</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.comments.index')}}">Comments</a>
    </li>

  </ul>
</nav>
<br>
<div class="container">
  @yield('content')
</div>
@yield('scripts')
</body>
</html>
