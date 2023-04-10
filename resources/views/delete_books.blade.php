@extends('layouts.mainlayout')


@section('title', 'Delete Books')


@section('content')

    <h1>yakin? {{ $book->title }} </h1>
    <div class="mt-5">

        <a href="/destroy_books/{{ $book->slug }}" class="btn btn-danger">Sure</a>
        <a href="/books" class="btn btn-primary">Cancel</a>
    </div>

@endsection
