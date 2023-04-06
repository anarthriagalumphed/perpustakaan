@extends('layouts.mainlayout')

@section('title', 'Dashboard')


@section('content')

    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $book_count }}</h3>
                    <p>Books</p>
                </div>
                <div class="icon">
                    <i class="fas fa-swatchbook"></i>
                </div>
                <a href="books" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $category_count }}</h3>
                    <p>Categories</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <a href="categories" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $user_count }}</h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
    </div>
    <div class="card">
        <div class="card-header">

            <h3 class="card-title">Rent Logs</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">


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
                <br>
                <a href="" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah
                    Rps</a>
                <tr>
                    <th>No</th>
                    <th>Kode Matkul</th>
                    <th>Nama Prodi</th>
                    <th>Nama Matkul</th>
                    <th>Dosen Penyusun</th>
                    <th>Nik Dosen</th>

                    <th>Tanggal Disusun</th>

                </tr>

                <!-- ini perlu diganti data => isi -->

                <!-- ini perlu diganti -->
                <tbody>
                    <tr>
                        <td>n</td>

                        <td>n</td>
                        <td>n</td>
                        <td>n</td>
                        <td>n</td>
                        <td>n</td>
                        <td>n</td>


                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
@endsection
