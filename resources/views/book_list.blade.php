@extends('layouts.mainlayout')
@section('title', 'Books List')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="my-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($books as $book)
                <div class="col col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card flex-fill">
                        <img src="{{ $book->cover != null ? asset('storage/cover/' . $book->cover) : asset('img/cover_buku_default.png') }}"
                            class="card-img-top object-fit-cover" alt="..." draggable="false">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $book->title }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <p
                                class="text-end font-weight-bold {{ $book->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                                {{ $book->status }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
