@extends('layouts.adminnavbar')

          @section('content')

          @if(Session::has('deleted_user'))
            <p class="bg-danger">{{session('deleted_user')}}</p>

          @elseif(Session::has('create_user'))
            <p>{{session('create_user')}}</p>

            @elseif(Session::has('update_user'))
              <p>{{session('update_user')}}</p>

          @endif
            <h2>Users</h2>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                </tr>
              </thead>
              <tbody>

                @if($users)

                    @foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td><img height="50" width="50" src="{{$user->photo ? $user->photo->file : "http://placehold.it/400x400"}}" alt="" class="img-responsive img-rounded"></td>
                      <td> <a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role->name}}</td>
                      <td>{{$user->is_active == 1 ? 'Active':'Not Active'}}</td>
                      <td>{{$user->created_at}}</td>
                      <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                @endif

              </tbody>
            </table>
            @endsection
