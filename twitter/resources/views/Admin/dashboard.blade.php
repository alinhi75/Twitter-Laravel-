@extends('layout.layout')
@section('title', 'Admin Dashboard')
@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-sidebar')
    </div>
    <div class="col-9">
        <h1>Admin Dashboard</h1>


        <div class="row">
            <div class="col-sm-6 col-md-4">
                @include('shared.widget',['icon'=>'fas fa-users mx-3','title'=>'Users','data'=>$totalusers])
            </div>
            <div class="col-sm-6 col-md-4">
                @include('shared.widget',['icon'=>'far fa-lightbulb mx-3','title'=>'Ideas','data'=>$totalideas])
            </div>
            <div class="col-sm-6 col-md-4">
                @include('shared.widget',['icon'=>'far fa-regular fa-comments mx-3','title'=>'Comments','data'=>$totalcomments])
            </div>
        </div>
    </div>
</div>
@endsection
