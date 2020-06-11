@extends('layouts.admin')

@section('content')

<h1>create user</h1>
    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store']) !!}
    <div class="form-group">
      {!! Form::label('name', 'Name')!!}
      {!!Form::text('name', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
      {!! Form::label('email', 'Email')!!}
      {!!Form::email('email', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
      {!! Form::label('role_id', 'Role')!!}
      {!!Form::select('role_id',[''=>'Choose Option'] + $roles, null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
      {!! Form::label('is_active', 'Status')!!}
      {!!Form::select('is_active',array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
      {!! Form::label('password', 'Password')!!}
      {!!Form::password('password', ['class'=>'form-control', 'placeholder' => 'Password'])!!} <!--if this does not work use the next commented line -->
      <!-- {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password']) !!} -->
    </div>

    <!-- <div class="form-group">
      {!! Form::label('password', 'Password')!!}
      {!!Form::password('password', null, ['class'=>'form-control'])!!}
    </div> -->

      <div class="form-group">
        {!! Form::submit('create post',['class'=>'btn btn-primary'])!!}
      </div>

    {!! Form::close() !!}

    @include('includes.form_error')

@endsection
