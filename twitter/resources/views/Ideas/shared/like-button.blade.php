<div>
    <form action="{{ route('ideas.like', $idea->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm">
            <span class="fas fa-thumbs-up"></span>
            <span class="ms-1"><span>{{ $idea->likes()->count() }}         </span>Like</span>
        </button>


    </form>


</div>


