@extends('layout.layout')
@section('title', 'Users | Admin Dashboard')
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
                        <a href="{{route('users.show', $user->id)}}" class="btn btn-primary btn-sm">Show</a>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                        </form>
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
