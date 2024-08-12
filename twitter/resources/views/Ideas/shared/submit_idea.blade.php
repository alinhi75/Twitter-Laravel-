@auth
<h4> Share yours ideas </h4>
<div class="row">
    <!-- action with post url -->
    <form action="{{route('idea.create')}}" method="post">
        @csrf
    <div class="mb-3">
        <textarea name="content"  class="form-control" id="content" rows="3"></textarea>
        @error('idea')
        <div class="alert alert-danger mt-4">{{ $message }}</div>
        @enderror
    </div>
    <div class="">
        <button type="submit" class="btn btn-dark"> Share </button>
    </div>
    </form>
</div>
@endauth
@guest
<div class="alert alert-info">
    <h4> You are not logged in </h4>
    <a href="{{route('login')}}"> Login </a> to share your ideas
</div>
@endguest

