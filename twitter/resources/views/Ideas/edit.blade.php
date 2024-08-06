
@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Edit Idea</h1>
    <form method="POST" action="{{ route('idea.update', $idea->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ $idea->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
