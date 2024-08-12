@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        @include('ideas.shared.submit_idea')
        <hr>
        @if(count($ideas) >0)
        @foreach($ideas as $idea)
        <div class="mt-3">
            <div class="card">
                <div class="px-3 pt-4 pb-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{$idea->user->name}}" alt="{{$idea->user->name}}">
                            <div>
                                <h5 class="card-title mb-0"><a href="{{route('users.show',$idea->user->id)}}"> {{$idea->user->name}}
                                    </a></h5>
                            </div>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('idea.destroy', $idea->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('idea.edit', $idea->id) }}" class="btn btn-secondary mx-3">Edit</a>
                                <a href="{{ route('idea.show',$idea->id)}}" class = "btn btn-secondary">view</a>
                                <button class="ms-3 btn btn-danger btn-sm"> Delete </button>

                            </form>

                        </div>
                    </div>
                </div>


                <div class="card-body">
                    @if($editing ?? false)
                    <form action="{{route('idea.update , $idea -> id')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <textarea name="content" class="form-control" id="content" rows="3">{{$idea -> content}}</textarea>
                            @error('content')
                            <div class="alert alert-danger mt-4">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-dark mt-4"> update </button>
                        </div>
                    </form>
                    @else
                    <p class="fs-6 fw-light text-muted">
                        {{ $idea->content }}
                    </p>
                    @endif
                    <div class="d-flex justify-content-between">
                        @include('ideas.shared.like-button')
                        <div>
                            <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                {{$idea -> created_at -> DiffforHumans()}} </span>
                        </div>
                    </div>

                </div>
            @include('shared.comments-box')
            </div>
        </div>
        @endforeach
        @else
        <div class="alert alert-info">No ideas found , Search for something else</div>
        @endif
        <div class="mt-3">
            {{ $ideas->withQueryString()->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
    <div class="col-3">
       @include('shared.Search-bar')
         @include('shared.follow-box')
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
</body>

</html>
@endsection
