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
            {{-- <a href="" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah
                Rent Logs</a> --}}

            <tr>
                <th>No</th>
                <th>User</th>
                <th>Book</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Actual Return Date</th>
                {{-- <th></th> --}}
            </tr>

            <!-- ini perlu diganti data => isi -->

            <!-- ini perlu diganti -->
            <tbody>

                @foreach ($rentlog as $item)
                    <tr
                        class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'bg-danger' : 'bg-success') }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->book->title }}</td>
                        <td>{{ $item->rent_date }}</td>
                        <td>{{ $item->return_date }}</td>
                        <td>{{ $item->actual_return_date }}</td>
                        {{-- <td>
                            <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>

                        </td> --}}
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
