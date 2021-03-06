@extends('layouts.adminnavbar')

@section('content')

<h1>Category</h1>

<div class="col-sm-6">

  {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}
  <div class="form-group">
    {!! Form::label('name', 'Name')!!}
    {!!Form::text('name', null, ['class'=>'form-control'])!!}

    <div class="form-group">
      {!! Form::submit('create category',['class'=>'btn btn-primary'])!!}
    </div>

  {!! Form::close() !!}
  </div>

</div>

<div class="col-sm-6">

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>category</th>
          <th>Created At</th>
        </tr>
      </thead>
      <tbody>

        @if($categories)

            @foreach($categories as $category)
            <tr>
              <td>{{$category->id}}</td>
              <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
              <td>{{$category->created_at ? $category->created_at : "not defined"}}</td>
            </tr>
            @endforeach
        @endif

      </tbody>
    </table>

</div>

@endsection
