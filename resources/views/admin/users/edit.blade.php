@extends('layouts.admin')

@section('content')

<h1>Edit User</h1>

<div class="row">

      <div class="col-sm-3">

        <img src="{{$user->photo ? $user->photo->file : "http://placehold.it/400x400"}}" alt="" class="img-responsive img-circle">

      </div>

      <div class="col-sm-9">

        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files'=>true]) !!}
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
          {!!Form::select('is_active',array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
          {!! Form::label('photo_id', 'File')!!}
          {!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
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
            {!! Form::submit('Update',['class'=>'btn btn-primary'])!!}
          </div>

      </div>


          {!! Form::close() !!}


          {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id], 'class'=>'pull-right'])!!}

              <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
              </div>

          {!! Form::close() !!}
</div>

<div class="row">
    @include('includes.form_error')
</div>



@endsection
