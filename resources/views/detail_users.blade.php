@extends('layouts.mainlayout')


@section('title', 'Detail user')


@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div>

        <form action="detail_users" method="post" enctype="multipart/form-data">
            @if ($user->status === 'inactive')
                <button href="/pprove_users/{{ $user->slug }}" class="btn btn-primary btn-sm mt-5"><i class="fas fa-save">
                        Approve</i> </button>
            @endif

            @csrf
            <div class="form-group mt-5 w-25 ">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label>Username</label>
                <input type="text" name="username" placeholder="insert code" id="code" class="form-control" readonly
                    value="{{ $user->username }}">
                <label>Phone</label>
                <input type="text" name="phone" placeholder="insert title" id="title" class="form-control" readonly
                    value="{{ $user->phone }}">
                <label>Status</label>
                <input type="text" name="phone" placeholder="insert title" id="title" class="form-control" readonly
                    value="{{ $user->status }}">



                </select>



                <div class="text-small text-danger"></div>
                <br>

            </div>




            <!-- sini tambah -->


            {{-- <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"> Reset</i> </button> --}}
        </form>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <script>
            $(document).ready(function() {
                $('.select-multiple').select2();
            });
        </script>
    @endsection
