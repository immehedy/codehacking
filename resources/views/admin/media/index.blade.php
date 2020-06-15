@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_photo'))
  <p class="bg-danger">{{session('deleted_photo')}}</p>

@endif

<h1>All Medias</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Photo</th>
      <th>created at</th>

    </tr>
  </thead>
  <tbody>

    @if($photos)

        @foreach($photos as $photo)
        <tr>
          <td>{{$photo->id}}</td>
          <td><img height="50" width="50" src="{{$photo->file ? $photo->file : "http://placehold.it/400x400"}}"
             alt="" class="img-responsive img-rounded"></td>
          <td>{{$photo->created_at}}</td>
          <td>
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]])!!}

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
