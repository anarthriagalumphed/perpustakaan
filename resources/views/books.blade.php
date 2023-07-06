@extends('layouts.mainlayout')

@section('title', 'Books')


@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">

            <h3 class="card-title">@yield('title')</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">

                {{-- 
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <br> --}}
                <a href="add_books" class="btn btn-primary btn-sm mb-2" style="margin-right: 10px;"><i class="fas fa-plus"></i>
                    Tambah
                    Books</a>
                <a href="deleted_books" class="btn btn-warning btn-sm mb-2" style="margin-right: 10px;"><i
                        class="fas fa-history"></i>
                    View Deleted
                    Data</a>
                <br>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <!-- ini perlu diganti data => isi -->

                <!-- ini perlu diganti -->
                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->book_code }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @foreach ($item->categories as $category)
                                    {{ $category->name }}<br>
                                @endforeach
                            </td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="/edit_books/{{ $item->slug }}" class="btn btn-warning btn-sm"title="edit book"><i
                                        class="fas fa-edit"></i></a>
                                <a href="/delete_books/{{ $item->slug }}" class="btn btn-danger btn-sm"
                                    title="delete book"><i class="fas fa-trash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection
