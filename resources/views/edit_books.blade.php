@extends('layouts.mainlayout')


@section('title', 'Edit books')


@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div>
        <form action="/edit_books/{{ $book->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-5 w-50 " style="margin: auto;">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label>Code</label>
                <input type="text" name="book_code" placeholder="insert code" id="code" class="form-control"
                    value="{{ $book->book_code }}">
                <label>Title</label>
                <input type="text" name="title" placeholder="insert title" id="title" class="form-control"
                    value="{{ $book->title }}">
                <label>Image</label>
                <input type="file" name="image" placeholder="insert name" id="image" class="form-control">
                <label class="form-label">Current Image</label><br>
                <div class="w-50">
                    @if ($book->cover != '')
                        <img src="{{ asset('storage/cover/' . $book->cover) }}" alt="" width="100%">
                    @else
                        <img src="{{ asset('img/cover_buku_default.png') }}" alt="" width="100%">
                    @endif
                </div>
                <label>Category</label>
                <select name="categories[]" id="category" class="form-control select2-multiple" multiple="multiple">

                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>

                <label for="currentCategory" class="form-label">Current Category</label>

                <div>
                    <ul>
                        @foreach ($book->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>




                <div class="text-small text-danger"></div>
                <br>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"> Save</i> </button>
            </div>




            <!-- sini tambah -->


            {{-- <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"> Reset</i> </button> --}}
        </form>


    @endsection
