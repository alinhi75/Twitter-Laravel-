@extends('layout.layout')
@section('title', 'Ideas | Admin Dashboard')
@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-sidebar')
    </div>
    <div class="col-9">
        <h1>Ideas</h1>
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ideas as $idea)
                <tr>
                    <td>{{$idea->id}}</td>
                    <td>{{$idea->user->name}}</td>
                    <td>{{$idea->content}}</td>
                    <td>{{$idea->created_at->toDateString()}}</td>
                    <td>
                        <a href="" class="btn btn-primary">View</a>
                        <a href="" class="btn btn-warning">Edit</a>
                        <form action="" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{$ideas->links()}}
        </div>
    </div>
</div>
@endsection
