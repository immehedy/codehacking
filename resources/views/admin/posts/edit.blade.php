@extends('layouts.adminnavbar')

@section('content')

<h1>Edit Post</h1>

<div class="row">

  <div class="col-sm-3">

    <img  class="img-thumbnail" src="{{$post->photo ? $post->photo->file : "http://placehold.it/400x400"}}" alt="">

  </div>

  <div class="col-sm-9">

    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files'=>true]) !!}
    <div class="form-group">
      {!! Form::label('title', 'Title')!!}
      {!!Form::text('title', null, ['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
      {!! Form::label('category_id', 'Category')!!}
      {!!Form::select('category_id', $categories , null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
      {!! Form::label('photo_id', 'File')!!}
      {!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
    </div>


        <div class="form-group">
          {!! Form::label('body', 'Description')!!}
          {!!Form::textarea('body', null, ['class'=>'form-control'])!!}
        </div>

      <div class="form-group">
        {!! Form::submit('Edit post',['class'=>'btn btn-primary'])!!}
      </div>

    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id], 'class'=>'pull-right'])!!}

        <div class="form-group">
          {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
        </div>

    </div>

    {!! Form::close() !!}


</div>

    @include('includes.form_error')

@endsection
