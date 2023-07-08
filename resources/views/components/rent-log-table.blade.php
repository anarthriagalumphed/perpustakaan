<div class="card card-danger" onclick="window.location='{{ route('rent_logs') }}'">
    <div class="card-header">

        <h3 class="card-title">Rent Logs</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">

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
                        <td>
                            @if ($item->user)
                                {{ $item->user->username }}
                            @else
                                User Banned
                            @endif
                        </td>
                        <td>
                            @if ($item->book)
                                {{ $item->book->title }}
                            @else
                                Book Deleted
                            @endif
                        </td>
                        <td>{{ $item->rent_date }}</td>
                        <td>{{ $item->return_date }}</td>
                        <td>{{ $item->actual_return_date }}</td>
                    </tr>
                @endforeach


            </tbody>

        </table>
    </div>
</div>
