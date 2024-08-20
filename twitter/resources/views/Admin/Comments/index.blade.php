@extends('layout.layout')
@section('title', 'Comments | Admin Dashboard')
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
                    <th>Idea</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>
                        <a href="{{route('users.show',$comment->user)}}"> {{$comment->user->name}}</a>
                    </td>
                    <td>
                        <a href="{{route('idea.show',$comment->idea)}}"> {{$comment->idea->id}}</a>
                    </td>
                    <td>{{$comment->content}}</td>
                    <td>{{$comment->created_at->toDateString()}}</td>
                    <td>
                        <form action="{{route('admin.comments.destroy',$comment)}}" method="POST" class="d-inline">
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
            {{$comments->links()}}
        </div>
    </div>
</div>
@endsection
