@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        @include('shared.success-message')

        <hr>

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
                                <button class="btn btn-danger btn-sm"> Delete </button>

                            </form>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <p class="fs-6 fw-light text-muted">
                        {{ $idea->content }}
                    </p>
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
                    @foreach($idea -> comments as $comment)
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
                                    <small class="fs-6 fw-light text-muted">{{$comment -> content}}</small>
                                </div>
                                <p class="fs-6 mt-3 fw-light">
                                    {{$comment -> content}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
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
