@extends('layout.layout')
@section('title', 'Admin Dashboard')
@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-sidebar')
    </div>
    <div class="col-9">
        <h1>Users</h1>
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    @if ($user->is_admin)
                    <td>Admin</td>
                    @else
                    <td>User</td>
                    @endif
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>

                        <a href="{{route('users.show', $user->id)}}" class="btn btn-primary">Show</a>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-Secondary">Edit</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{$users->links()}}
        </div>
    </div>
</div>
@endsection
