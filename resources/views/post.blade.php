<!DOCTYPE html>
<html>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
  width: 100%;
}
.cmnt-reply{
  display: none;
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

        <hr>

      <!-- show comment right side of the comment box -->
    <div class="card">
      <h1>Comments:</h1>
      @if(count($comments)>0)

        @foreach($comments as $comment)

          <div class="container">
          <div class="row">
          <div class="col-md-8">
          <h2 class="page-header"></h2>
          <section class="comment-list">
          <!-- First Comment -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="{{$comment->photo}}" />
                <figcaption class="text-center">{{$comment->author}}</figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> {{$comment->author}}</div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>{{$comment->created_at}}</time>
                  </header>
                  <div class="comment-post">
                    <p>
                        {{$comment->body}}
                    </p>
                  </div>
                  <p class="text-right"><button class="btn btn-primary" onclick="myFunction()">Reply</button></p>
                </div>
              </div>
            </div>
          </article>
          @if(count($comment->replies))
            @foreach($comment->replies as $reply)
            @if($reply->is_active == 1)
          <!-- Second Comment Reply -->
          <div id="cmnt-reply">
          <article class="row">
            <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="{{$reply->photo}}" />
                <figcaption class="text-center">{{$reply->author}}</figcaption>
              </figure>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="panel panel-default arrow left">
                <div class="panel-heading right">Reply</div>
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> {{$reply->author}}</div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>{{$reply->created_at}}</time>
                  </header>
                  <div class="comment-post">
                    {{$reply->body}}
                  </div>

                </div>
              </div>
            </div>
          </article>
          @endif
          @endforeach
          @endif



          {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}
            <input type="hidden" name="comment_id" value="{{$comment->id}}">
            <div class="form-group">
            {!! Form::label('body', 'Body')!!}
            {!!Form::text('body', null, ['class'=>'form-control', 'rows'=>1])!!}

            <div class="form-group">
              {!! Form::submit('Reply',['class'=>'btn btn-primary'])!!}
            </div>

          {!! Form::close() !!}

        </div>
          </section>
          </div>
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
  <script>
    function myFunction() {
        var x = document.getElementById("cmnt-reply");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }

  </script>
  </body>
</div>

</html>
