@extends('layouts.mainlayout')


@section('title', 'Delete Users')


@section('content')


    <h1>Are you sure to ban this user? <strong>{{ $user->username }}</strong></h1>
    <div class="mt-5">

        <a href="/destroy_users/{{ $user->slug }}" class="btn btn-danger">Sure</a>
        <a href="/users" class="btn btn-primary">Cancel</a>
    </div>

@endsection
