@extends('layouts.adminnavbar')

@section('content')

<h1>Posts</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Photo</th>
      <th>User</th>
      <th>Category</th>
      <th>Title</th>
      <th>Body</th>
      <th>Post</th>
      <th>Comments</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

    @if($posts)

        @foreach($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td><img height="50" width="50" src="{{$post->photo ? $post->photo->file : "http://placehold.it/400x400"}}"
             alt="" class="img-responsive img-rounded"></td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
          <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
          <td>{{str_limit($post->body,50)}}</td>
          <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
          <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>
          <td>{{$post->created_at}}</td>
          <td>{{$post->updated_at->diffForHumans()}}</td>
          <td>
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]])!!}

                <div class="form-group">
                  {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                </div>

            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
    @endif

  </tbody>
</table>

@endsection
