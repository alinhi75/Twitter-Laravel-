<div class="col-6">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">

                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{$user->profileImage()}}" alt="profile-picture">

                    <div>
                        @if($editing ?? false)
                        <label class="mt-4 " for="name">Name : </label>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                        @error('name')
                        <div class="alert alert-danger mt-4">{{ $message }}</div>
                        @enderror
                        @else
                        <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                            </a></h3>
                        <span class="fs-6 text-muted">{{$user->email}}</span>
                        @endif
                    </div>
                </div>
                @auth
                @if (Auth::user()->id == $user->id)
                <div>
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm"> Edit Profile </a>
                    @if($editing ?? false)
                    <a href="{{route('users.show',$user->id)}}" class="btn btn-primary btn-sm"> Back </a>
                    @endif
                </div>
                @endif
                @endauth
            </div>
            @if($editing ?? false)

            <div>
                <label class="mt-4 " for="image">Profile Picture : </label>
                <input name="image" type="file" class="form-control mt-3">
                @error('image')
                <div class="alert alert-danger mt-4">{{ $message }}</div>
                @enderror
            </div>
            @endif
            <div class="px-2 mt-4">
                @if($editing ?? false)
                <label class="mt-4 " for="bio">Bio : </label>
                <textarea name="bio" value="Add your Bio Here" id="bio" class="form-control" rows="3">{{$user->bio}}</textarea>
                @error('bio')
                <div class="alert alert-danger mt-4">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary btn-sm"> Save </button>
                </div>
                @else
                <h5 class="fs-5"> Bio : </h5>
                <p class="fs-6 fw-light">
                    {{$user->bio}}
                @endif
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{$user->ideas()->count()}} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{$user->comments()->count()}} </a>
                </div>
                @auth
                @if (Auth::user()->id != $user->id)
                <div class="mt-3">
                    <button class="btn btn-primary btn-sm"> Follow </button>
                </div>
                @endif
                @endauth
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Show Ideas </h5>
            <div class="list-group">
                @foreach ($user->ideas as $idea)
                <a href="{{route('idea.show',$idea->id)}}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$idea->title}}</h5>
                        <small>{{$idea->created_at->diffForHumans()}}</small>
                    </div>
                    <p class="mb-1">{{$idea->description}}</p>
                    <small>By {{$idea->user->name}}</small><br/>
                    <small>Comments : {{$idea->comments->count()}}</small>
                </a>
                @endforeach
            </div>
            </form>
        </div>
    </div>
</div>
