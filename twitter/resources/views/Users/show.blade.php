
@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>


        @include('shared.User-card')


    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
@endsection
