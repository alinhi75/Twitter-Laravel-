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
                        <a href="{{route('idea.show',$idea->id)}}" class="btn btn-primary btn-sm">Show</a>
                        <a href="{{route('idea.edit',$idea->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('idea.destroy', $idea->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
