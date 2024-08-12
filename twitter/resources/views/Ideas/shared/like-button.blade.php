<div>
    @auth
    @if(Auth::user()->likesIdea($idea))
    <form class="mt-4" action="{{ route('ideas.unlike', $idea->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            <span class="far fa-thumbs-down"></span>
            <span class="ms-1"><span>{{ $idea->likes()->count() }} </span>Unlike</span>
        </button>
    </form>

    @else
    <form action="{{ route('ideas.like', $idea->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm">
            <span class="fas fa-thumbs-up"></span>
            <span class="ms-1"><span>{{ $idea->likes()->count() }} </span>Like</span>
        </button>
    </form>
    @endif
    @endauth
    @guest
    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
        <span class="fas fa-thumbs-up"></span>
        <span class="ms-1"><span>{{ $idea->likes()->count() }} </span>Like</span>
    </a>
    @endguest

</div>
