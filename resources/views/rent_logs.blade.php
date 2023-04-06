@extends('layouts.mainlayout')

@section('title', 'Rent Logs')


@section('content')


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
                    <th></th>
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
                        <td>

                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>

@endsection
