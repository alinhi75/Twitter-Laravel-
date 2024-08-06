@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        @include('shared.submit_idea')
        <hr>
        @foreach($ideas as $idea)
        <div class="mt-3">
            <div class="card">
                <div class="px-3 pt-4 pb-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                            <div>
                                <h5 class="card-title mb-0"><a href="#"> Mario
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
                        <div>
                            <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                                </span> {{$idea -> likes }} </a>
                        </div>
                        <div>
                            <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                {{$idea -> created_at}} </span>
                        </div>
                    </div>
                    <div>
                        <div class="mb-3">
                            <textarea class="fs-6 form-control" rows="1"></textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm"> Post Comment </button>
                        </div>

                        <hr>
                        <div class="d-flex align-items-start">
                            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi" alt="Luigi Avatar">
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="">Luigi
                                    </h6>
                                    <small class="fs-6 fw-light text-muted"> 3 hour
                                        ago</small>
                                </div>
                                <p class="fs-6 mt-3 fw-light">
                                    and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
                                    Evil)
                                    by
                                    Cicero, written in 45 BC. This book is a treatise on the theory of ethics,
                                    very
                                    popular during the Renaissan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
        <div class="mt-3">
            {{ $ideas->links() }}
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
