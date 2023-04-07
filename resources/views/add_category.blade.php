@extends('layouts.mainlayout')


@section('title', 'Add Category')


@section('content')





    <div>



        <form action="add_category" method="post">


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
                <label>Name</label>

                <input type="text" name="name" placeholder="insert name" class="form-control">
                <div class="text-small text-danger"></div>
                <br>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"> Save</i> </button>
            </div>




            <!-- sini tambah -->


            {{-- <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"> Reset</i> </button> --}}
        </form>

        </>

    @endsection
