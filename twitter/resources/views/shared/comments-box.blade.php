<div>
    <form action="{{route('ideas.comments.store',$idea -> id)}}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm mt-3"> Post Comment </button>
        </div>
    </form>
    @forelse($idea -> comments as $comment)
    <div class="d-flex align-items-start mt-5">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi" alt="Luigi Avatar">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class="">Luigi
                </h6>
                <small class="fs-6 fw-light text-muted">{{$comment->created_at}}</small>
            </div>
            <p class=" fs-6 mt-3 fw-light">
                {{$comment -> content}}
            </p>
        </div>
    </div>
    <hr>
    @empty
    <p class="fs-6 fw-light text-muted mt-3">No comments yet</p>
    @endforelse
</div>
