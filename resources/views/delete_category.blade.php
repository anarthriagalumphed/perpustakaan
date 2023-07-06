@extends('layouts.mainlayout')


@section('title', 'Delete Category')


@section('content')


    <h1>Are you sure to delete this book? <strong>{{ $category->name }}</strong></h1>
    <div class="mt-5">

        <a href="/destroy_category/{{ $category->slug }}" class="btn btn-danger">Sure</a>
        <a href="/categories" class="btn btn-primary">Cancel</a>
    </div>

@endsection
