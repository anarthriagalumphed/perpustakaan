@extends('layouts.mainlayout')


@section('title', 'Delete Users')


@section('content')

    <h1>yakin? {{ $user->username }} </h1>
    <div class="mt-5">

        <a href="/destroy_users/{{ $user->slug }}" class="btn btn-danger">Sure</a>
        <a href="/users" class="btn btn-primary">Cancel</a>
    </div>

@endsection
