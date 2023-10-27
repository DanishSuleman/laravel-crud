<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" type="image/x-icon">

    <title>CRUD - Laravel</title>
  </head>
  <body>
    @auth
    <div class="alert d-flex align-items-center justify-content-between alert-success alert-dismissible fade show" role="alert">
      <strong>You've logged in sucessfully!</strong>
      <form action="/logout" class="text-right" method="POST">
        @csrf
        <button type="submit" class="btn btn-success mt-2">Logout</button>
      </form>
      {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span> --}}
      </button>

    </div>
    <div class="container">
    </div>

    <div class="container posts py-5">
  <h2>Create a Post</h2>
  <form action="/create-post" method="POST">
    @csrf
    <div class="form-group">
      <label for="post-title">Post Title</label>
      <input type="text" class="form-control" id="post-title" name="post-title" placeholder="Post Title">
    </div>
    <div class="form-group">
      <label for="post-content">Post Content</label>
      <textarea class="form-control" placeholder="Post Content" id="post-content" name="post-content" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
</div> 
</div>

<div class="container">
  <h2>All Posts:</h2>
  @if ($posts)
  @foreach ($posts as $post)
  <div class="my-4 jumbotron">
    <h3>{{$post['post-title']}}</h3>
    <p class="lead">{{$post['post-content']}}</p>
    <hr class="my-4">
    <a class="btn btn-primary btn-md" href="/edit-post/{{$post->id}}" role="button">Edit</a>
    <a class="btn btn-primary btn-md" href="#" role="button">Delete</a>
  </div>
  @endforeach
  @else
  <p>No Posts Found.</p>
  @endif
</div>
      @else
      <div class="row d-flex justify-content-center py-2 px-5">
        <div class="col-md-4 mx-2">
        <h2 class="py-3">Register</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
              <label for="registerUserName">Username</label>
              <input type="text" class="form-control" name="name" id="registerUserName">
            </div>
            <div class="form-group">
              <label for="registerEmail">Email address</label>
              <input type="email" class="form-control" name="email" id="registerEmail">
            </div>
            <div class="form-group">
              <label for="registerPassword">Password</label>
              <input type="password" name="password" class="form-control" id="registerPassword">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
        <div class="col-md-4 mx-2 mt-2">
          <h2 class="py-3">Login</h2>
          <form action="/login" method="POST">
              @csrf
              <div class="form-group">
                <label for="loginUserName">Username</label>
                <input type="text" class="form-control" name="loginUserName" id="loginUserName">
              </div>
              <div class="form-group">
                <label for="loginPassword">Password</label>
                <input type="password" name="loginPassword" class="form-control" id="loginPassword">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
    @endauth
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>