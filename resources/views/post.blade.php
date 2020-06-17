<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

.well{
  float: left;
  width: 50%;
}
.show-cmnt{
  float: left;
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.pull-left{
  margin-top: 20px;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {
    width: 100%;
    padding: 0;
  }
}
</style>
</head>
<body>
<div class="container">
  <div class="header">
    <h2>Blog Posts</h2>
    <h6> <a href="{{route('admin.users.index')}}">Admin page</a></h6>
  </div>

  <div class="row">
    <div class="leftcolumn">
      <div class="card">
        <h2>{{$post->title}}</h2>
        <h5>by {{$post->user->name}}, {{$post->created_at->diffForHumans()}}</h5>
        <div class="imgresponsive" style="height:900x300;">
          <img src="{{$post->photo->file}}" alt="">
        </div>
        <p>Post :</p>
        <p>{{$post->body}}</p>
      </div>
      <div class="card">
        @if(Session::has('comment_created'))
          <p class="bg-danger">{{session('comment_created')}}</p>
        @endif
        <div class="well">
          <h4>Leave a Comment:</h4>

          {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

              <div class='form-group'>
                  {!! Form::textarea('body',null,['class'=>'form-control','rows'=>5]) !!}
              </div>

              <div class='form-group'>
                  {!! Form::submit('Submit comment',['class'=>'btn btn-danger']) !!}
              </div>

          {!! Form::close() !!}

        </div>

<!-- show comment right side of the comment box -->

@if(count($comments)>0)

  @foreach($comments as $comment)
          <div class="show-cmnt">
            <div class="media-body">
              <h3>
                <!-- <img height="50" src="{{$comment->photo}}" alt="" class="img-thumbnail"> -->
              {{$comment->author}} <br> <small>{{$comment->created_at->diffForHumans()}}</small>
            </h3>
              <p>{{$comment->body}}</p>
            </div>
          </div>
    @endforeach
@endif
      </div>
    </div>
    <div class="rightcolumn">
      <div class="card">
        <h2>About Me</h2>
        <div class="fakeimg" style="height:100px;">Image</div>
        <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
      </div>
      <div class="card">
        <h3>Popular Post</h3>
        <div class="fakeimg">Image</div><br>
        <div class="fakeimg">Image</div><br>
        <div class="fakeimg">Image</div>
      </div>
      <div class="card">
        <h3>Follow Me</h3>
        <p>Some text..</p>
      </div>

      <hr>


    </div>
  </div>

  <div class="footer">
    <h2>Footer</h2>
  </div>

  </body>
</div>

</html>
