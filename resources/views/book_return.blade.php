@extends('layouts.mainlayout')

@section('title', 'Book Return')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @if (session('message'))
        <div class="alert {{ session('alert-class') }}">
            {{ session('message') }}
        </div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Book Return</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="book_return" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="inputuser">User</label>
                                <select name="user_id" type="user" class="form-control userbox" id="inputuser"
                                    placeholder="Enter User">
                                    <option value="" disabled selected>Select User</option>
                                    @foreach ($users as $item)
                                        @if ($item->role_id != 1)
                                            <option value="{{ $item->id }}">{{ $item->username }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputbook">Book</label>
                                <select name="book_id" type="book" class="form-control select2-multiple"
                                    multiple="multiple" id="inputbook" placeholder="Enter Book Title">
                                    <option value="" disabled>Select Book</option>
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </div>
                    <!-- /.card-body -->


                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.userbox').select2();

            $('#inputuser').change(function() {
                // Kosongkan pilihan buku
                $('#inputbook').empty();

                // Ambil ID pengguna yang dipilih
                let userID = $(this).val();

                if (userID) {
                    $('#inputbook').select2({
                        allowClear: true,
                        width: '100%',
                        ajax: {
                            url: '{{ route('admin.selectState') }}?userID=' + userID,
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                return {
                                    results: $.map(data, function(item) {
                                        return {
                                            text: item.book_code + ' | ' + item.title,
                                            id: item.id
                                        }
                                    })
                                };
                            }
                        }
                    });
                } else {
                    $('#inputbook').empty();
                }
            });
        });
    </script>
@endsection
